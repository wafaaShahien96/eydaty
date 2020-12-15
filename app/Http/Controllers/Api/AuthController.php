<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\User;
use App\Models\VerifyResetPassword;
use App\Models\PasswordReset;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|string|email|max:100|unique:users',
            'password' => 'nullable|string|confirmed|min:6',
            'phone' => 'required|unique:users|string',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'verification_code' => rand(1111, 9999),

        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ]);
    }

    public function checkverificationcode(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user)
            return response()->json([
                'massage' => 'User is Not Exist'
            ]);
        if ($request->has('verification_code')) {
            if ($user->verification_code === $request->verification_code) {
                $user->Update([
                    'status' => 'active',
                    'phone_verified_at' => new Carbon(),
                ]);
                Auth::login($user);
                return response()->json([
                    'message' => 'You Are logged in Succussefuly'
                ], 201);
            } else {
                return response()->json([
                    "msg" => "This Verification Is Invalid"
                ]);
            }
        }
    }

    public function resendVcode(Request $request)
    {
        $phone = $request->phone;
        $v_code = rand(1111, 9999);
        $user = User::where('phone', $request->phone)->first();
        $user->update([
            'verification_code' => $v_code,
            'updated_at' => new Carbon()
        ]);
        return response()->json([
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|exists:users,phone',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $credentials = [
            'phone' => request('phone'),
            'password' => request('password'),
            'status' => 'active'
        ];

        if (!$token = Auth::guard()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        Auth::guard()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function completeProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required|in:male,female',
            'image' => 'required|image',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = Auth::user();
        $user_data = $request->all();

        if ($request->hasFile('image')) {

            $newImage = Image::make($request->image)->encode('jpeg');
            Storage::disk('local')->put('public/images/users/' . $request->image->hashName(), (string)$newImage, 'public');

            $user_data['image'] = $request->image->hashName();
        }
        $user->update($user_data);
        return response()->json([
            "msg" => "User Profile has been Created",
            'user' => $user_data
        ]);
    }

    public function UserProfile()
    {
        return response()->json(auth()->user());
    }

    public function sendResetPasswordVCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::where('phone', $request->phone)->first();
        if (!$user)
            return response()->json([
                'massage' => 'User is Not Exist'
            ]);
        $verify_code = rand(1111, 9999);
        $verifyresetpassword = VerifyResetPassword::create([
            'phone' => $request->phone,
            'verification_code' => $verify_code,
            'created_at' => Carbon::now(),
        ]);
        if ($user && $verify_code)
            return response()->json([
                'message' => 'We have Sent A SMS To Your Phone Number',
                'user' => $user,
                'verify_code' => $verify_code
            ]);
    }

    public function resendPasswordVCode(Request $request)
    {
        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        $v_code = rand(1111, 9999);
        $Verifypassword = VerifyResetPassword::where('phone', $phone)->update([
            'verification_code' => $v_code,
            'created_at' => new Carbon(),
        ]);
        return response()->json([
            'user' => $user,
            'v_code' => $v_code
        ]);
    }

    public function CreateToken(Request $request)
    {
        $phone = $request->phone;
        $verfiyResetPassword = VerifyResetPassword::where('phone', $request->phone)->first();
        $user = User::where('phone', $request->phone)->first();
        if ($request->has('verify_code')) {
            if ($verfiyResetPassword->verification_code === $request->verify_code) {
                $passwordReset = PasswordReset::create([
                    'phone' => $request->phone,
                    'token' => Str::random(60),
                    'created_at' => Carbon::now()
                ]);

                VerifyResetPassword::where('phone', $phone)->delete();
            }
        }
        return response()->json([
            'token' => $passwordReset->token,
            'user' => $user
        ]);
    }

    public function resetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string|confirmed',
            'token' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $passwordReset = PasswordReset::where([
            ['phone', $request->phone],
            ['token', $request->token],
        ])->first();

        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ]);

        $user = User::where('phone', $passwordReset->phone)->first();
        if (!$user)
            return response()->json([
                'massage' => 'User is Not Exist'
            ]);
        $user->password = bcrypt($request->password);
        $user->save();
        PasswordReset::where([
            ['token', $request->token],
            ['phone', $request->phone]
        ])->delete();
        return response()->json($user);
    }
}
