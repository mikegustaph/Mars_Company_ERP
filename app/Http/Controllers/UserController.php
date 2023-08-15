<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function index()
    {
        return view('user.adduser');
    }
    public function addview()
    {
        $user = User::with('roleuser')->get();
        return view('user.userlist', compact('user'));
    }
    public function store()
    {
        //... code...
    }
    public function editview($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        $user->delete();

        return redirect()->back()->with('message', 'User has been deleted successfully!');
    }
    public function permission($id)
    {
        $user = User::find($id);
        return view('role.permission', compact('user'));
    }
    public function changepermission(Request $request, $id)
    {
    }
}
