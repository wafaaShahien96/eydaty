<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitRequestRequest;
use App\Http\Requests\UpdateVisitRequestRequest;

use Illuminate\Http\Request;
use App\Models\VisitRequest;
use App\Models\User;

class VisitRequestController extends Controller
{
    public function index(){
        $visitRequests = VisitRequest::latest()->paginate(10);
        return view('dashboard.visitRequest.index' ,compact('visitRequests'));
    }

    public function create(){
        return view('dashboard.visitRequest.create')->with('users' ,User::all());
    }

    public function store(StoreVisitRequestRequest $request){
        $visitRequest = VisitRequest::create($request->all());
        return redirect()->route('admin.visit_request.index')->with(['success'=> 'Visit Request Create Successfully']);
    }

    public function edit(VisitRequest $visitRequest){
        return view('dashboard.visitRequest.edit',compact('visitRequest'))->with('users' ,User::all());
    }

    public function update(UpdateVisitRequestRequest $request ,VisitRequest $visitRequest){
        $visitRequest->update($request->all());
        return redirect()->route('admin.visit_request.index')->with(['success' => 'Visit Request Updated Successfully']);
    }

    public function destroy(VisitRequest $visitRequest){
        $visitRequest->delete();
        return back()->with(['success'=> 'Visit Request deleted Successfully']);
    }
}
