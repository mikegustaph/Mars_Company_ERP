<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function general()
    {
        $res = GeneralSetting::latest('updated_at')->get();
        foreach($res as $setting){
            return view('settings.generalsetting', compact('setting'));
        }
    }
    public function store(Request $request){

        $data  = new GeneralSetting();
        $data->site_name  =  $request->site_name;
        $data->phone      =  $request->phone;
        $data->email      =  $request->email;
        $data->logo       =  $request->logo;
        $data->favicon    =  $request->favicon;
        $data->footer     =  $request->footer;
        $data->address    =  $request->address;

        $data->save();
        return redirect()->route('settings.general')->with('message', 'Changes updated successfully.');

    }

    public function updatesetting(Request $request, $id){

       /* if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo'.'.'.$logo->getClientOriginalExtension();
            $logo->storeAs('public/images', $logoName);
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = 'favicon.ico';
            // Process and save the favicon file
            $favicon->storeAs('public/images', $faviconName);
        }
       $validate  = $request->validate([
            'site_name' => 'required|string|max:250',
            'phone'     =>  'required',
            'email'     =>  'required',
            'logo'      =>  'required|max:2018',
            'favicon'   =>  'required|max:2018',
            'footer'    =>  'required',
            'address'   => 'required',
        ]);

        $data  =  GeneralSetting::find($id);
        $data->site_name        =  $request->site_name;
        $data->phone            =  $request->phone;
        $data->email            =  $request->email;
        $data->logo             =  $logoName;
        $data->favicon          =  $faviconName;
        $data->footer           =  $request->footer;
        $data->address          =  $request->address;

        $data->update();*/
        $validate = $request->validate([
            'site_name' => 'required|string|max:250',
            'phone' => 'required',
            'email' => 'required',
            'logo' => 'required|max:2018',
            'favicon' => 'required|max:2018',
            'footer' => 'required',
            'address' => 'required',
        ]);
        $data = GeneralSetting::find($id);
        // Update the data with the new values
        $data->update([
            'site_name' => $request->site_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'footer' => $request->footer,
            'address' => $request->address,
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public/images', $logoName);
            $data->logo = $logoName;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = 'favicon.ico';
            // Process and save the favicon file
            $favicon->storeAs('public/images', $faviconName);
            $data->favicon = $faviconName;
        }

        $data->update();
        return redirect()->route('settings.general')->with('message', 'Changes updated successfully.');
    }
}
