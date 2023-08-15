<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    public function profilesetting()
    {
        $user = User::all();
        return view('settings.profilesettings', compact('user'));
    }
}
