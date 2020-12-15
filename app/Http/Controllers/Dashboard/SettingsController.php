<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Settings;

class SettingsController extends Controller
{

    public function index(Settings $settings){
        $settings = Settings::all();
        return view('dashboard.settings.index',compact('settings'));
    }

    public function edit(Settings $setting){
       return view('dashboard.settings.edit' ,compact('setting') );
    }

    public function update(UpdateSettingRequest $request , Settings $setting){

        $data = $request->all();
        if (request()->hasFile('logo')) {

            $newLogo = Image::make($request->logo)->encode('jpg');
            Storage::disk('local')->put('public/images/logo/' . $request->logo->hashName(), (string)$newLogo,'public');

            $data['logo'] = $request->logo->hashName();
        }
        $setting->update($data);
       return redirect()->route('admin.settings.index')->with(['success' => 'Settings Updated Successfully']);
     }
}

