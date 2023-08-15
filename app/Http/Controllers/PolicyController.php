<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    public function displayPolicy()
    {
        $policies = Policies::all();
        return view('policies.policies', compact('policies'));
    }

    public function createPolicy(Request $request)
    {
        $policy = new Policies();

        $policy->policy_name = $request->policy_name;
        if($request->hasFile('file')){
            $file      = $request->file('file');
            $fileName  = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files', $fileName);
        }
        $policy->file =  $fileName;

        $policy->save();
        return redirect()->route('policies.policies');
    }
}
