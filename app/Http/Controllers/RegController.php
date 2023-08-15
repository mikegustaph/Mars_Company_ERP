<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'role_id'  => 'required'
        ]);

        $newUser = User::create([
            'name'      =>  $request->input('name'),
            'email'     =>  $request->input('email'),
            'password'  =>  Hash::make($request->input('password')),
            'role'      =>  $request->input('role_id')
        ]);

        return redirect()->back()->with('message', 'Successfully created a new user!');
    }
    public function Edit(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|min:8|confirmed',
            'role_id'  => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role_id');
        $user->update();

        return redirect()->back()->with('message', 'Changes have been updated successfully!');
    }
}
