<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreHomeExRequestRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeExRequest;
use App\Models\User;

class HomeExRequestController extends Controller
{
    public function index(){
        $homeExRequests = HomeExRequest::latest()->paginate(10);
        return view('dashboard.homeExRequest.index',compact('homeExRequests'));
    }

    public function create(){
        return view('dashboard.homeExRequest.create')->with('users',User::all());
    }

    public function store(Request $request){

        if($request->has('status') && $request->status == "accepted")
        {
            $homeExRequest = HomeExRequest::create([
                'user_id' => $request->user_id,
                'required_date'=>$request->required_date,
                'status' =>$request->status,
                'accepted_date'=>Carbon::now(),
            ]);
        }else{
            $homeExRequest = HomeExRequest::create([
                'user_id' => $request->user_id,
                'required_date'=>$request->required_date,
            ]);
        }


        return redirect()->route('admin.home_ex_request.index')->with(['success' => 'Home Request Added Successfully']);
    }

    public function edit(HomeExRequest $homeExRequest){
        return view('dashboard.homeExRequest.edit',compact('homeExRequest'));
    }

   public function update(Request $request,HomeExRequest $homeExRequest){
    if($request->status == 'accepted')
    {
        $homeExRequest->update([
            'status' =>$request->status,
            'accepted_date'=>Carbon::now(),
        ]);
    }else{
        $homeExRequest->update([
            'status' =>$request->status,
            'accepted_date'=>null,
        ]);
    }

    $homeExRequest->save();
    return redirect()->route('admin.home_ex_request.index')->with(['success' => 'Home Request Updated Successfully']);
   }
}
