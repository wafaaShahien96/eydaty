<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.user.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = $request->all();
        if (request()->has('password')) {
            $user['password'] = Hash::make($user['password']);
        }

        if ($request->hasFile('image')) {

            $newImage = Image::make($request->image)->encode('jpeg');
            Storage::disk('local')->put('public/images/users/' . $request->image->hashName(), (string)$newImage, 'public');

            $user['image'] = $request->image->hashName();
        }

        $user = User::create($user);

        return redirect()->route('admin.users.index')->with(['success' => 'User Added Successully']);
    }


    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $data = $request->all();
        if ($user->password) {
            $data['password'] = Hash::make($user['password']);
        }

        if ($request->hasFile('image')) {

            $newImage = Image::make($request->image)->encode('jpeg');
            Storage::disk('local')->put('public/images/users/' . $request->image->hashName(), (string)$newImage, 'public');

            $data['image'] = $request->image->hashName();
        }
        $user->update($data);

        return redirect()->route('admin.users.index')->with(['success' => 'User Updateded Successully']);
    }


    public function destroy(User $user)
    {
        Storage::disk('local')->delete('public/images/users/' . $user->image);

        $user->delete();
        return redirect()->route('admin.users.index')->with(['success' => 'User Deleted Successully']);
    }
}
