<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePricingRequest;

use Illuminate\Http\Request;
use App\Models\Pricing;

class PricingController extends Controller
{
    public function index(Pricing $pricing){
        $pricings = Pricing::all();
        return view('dashboard.pricing.index',compact('pricings'));
    }

    public function edit(Pricing $pricing){
       return view('dashboard.pricing.edit' ,compact('pricing') );
    }

    public function update(UpdatePricingRequest $request , Pricing $pricing){
        $pricing->update($request->all());
        return redirect()->route('admin.pricing.index')->with(['success' => 'Pricing Updated Successully']);
      }

    }

