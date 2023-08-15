<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\ModuleSetting;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function moduleSetting()
    {
        ///  $setting = ModuleSetting::all();
        return view('settings.modulesetting');
    }
}
