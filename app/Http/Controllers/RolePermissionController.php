<?php

namespace App\Http\Controllers;

use App\Models\Role_has_Permission;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RolePermissionController extends Controller
{
    public $guard_name = 'web';
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roleResult = Role::all();
        return view('role.role', compact('roleResult'));
    }
    public function createview()
    {
        return view('role.permission');
    }
    public function store(Request $request)
    {
        $role = $request->validate([
            'rolename'    => 'required',
            'description' => 'required'
        ]);
        $roleCreate = new Role();
        $roleCreate->name         =   $request['rolename'];
        $roleCreate->description  =   $request['description'];
        $roleCreate->guard_name   =   $request['guard_name'];
        $roleCreate->save();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function edit(Request $request, $id)
    {
        $role = $request->validate([
            'rolename'    => 'required',
            'description' => 'required'
        ]);
        $role = Role::find($id);
        $role->name        =  $request['rolename'];
        $role->description =  $request['description'];
        $role->guard_name  =  $request['guard_name'];
        $role->update();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function delete()
    {
        //....code....
    }
    public function permission($id)
    {
        //return view('role.permission');
    }
    public function changePermission(Request $request, $id)
    {
        //$user = auth()->user()->hasRole('');
        //dd($user->hasRole(['admin']));

        $role = Role::find($id);
        //$role_has_perm = Role_has_Permission::with('permission')->get();
        $role_has_perm = Role::findByName($role->name)->permissions;
        foreach ($role_has_perm as $permission) {
            $all_permission[] = $permission->name;
            if (empty($all_permission)) {
                echo 'No Permission';
            } else {
                return view('role.change-permission', compact('all_permission', 'role'));
            }
        }
    }
    public function changePermissionStore(Request $request)
    {
        $roleId = $request['role_id'];
        $role = Role::firstOrCreate(['id' => $request['role_id']]);
        //client module
        if ($request->has('client-view')) {
            $permission = Permission::firstOrCreate(['name' => 'client-view']);
            if (!$role->hasPermissionTo('client-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-view');
        }
        if ($request->has('client-add')) {
            $permission = Permission::firstOrCreate(['name' => 'client-add']);
            if (!$role->hasPermissionTo('client-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-add');
        }
        if ($request->has('client-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'client-edit']);
            if (!$role->hasPermissionTo('client-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-edit');
        }
        if ($request->has('client-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'client-delete']);
            if (!$role->hasPermissionTo('client-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-delete');
        }
        //Task module
        if ($request->has('task-view')) {
            $permission = Permission::firstOrCreate(['name' => 'task-view']);
            if (!$role->hasPermissionTo('task-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-view');
        }
        if ($request->has('task-add')) {
            $permission = Permission::firstOrCreate(['name' => 'task-add']);
            if (!$role->hasPermissionTo('task-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-add');
        }
        if ($request->has('task-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'task-edit']);
            if (!$role->hasPermissionTo('task-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-edit');
        }
        if ($request->has('task-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'task-delete']);
            if (!$role->hasPermissionTo('task-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-delete');
        }
        //Service Module
        if ($request->has('service-view')) {
            $permission = Permission::firstOrCreate(['name' => 'service-view']);
            if (!$role->hasPermissionTo('service-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-view');
        }
        if ($request->has('service-add')) {
            $permission = Permission::firstOrCreate(['name' => 'service-add']);
            if (!$role->hasPermissionTo('service-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-add');
        }
        if ($request->has('service-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'service-edit']);
            if (!$role->hasPermissionTo('service-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-delete');
        }
        if ($request->has('service-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'service-delete']);
            if (!$role->hasPermissionTo('service-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-delete');
        }
        //Dispatch Module
        if ($request->has('dispatch-view')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-view']);
            if (!$role->hasPermissionTo('dispatch-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-view');
        }
        if ($request->has('dispatch-add')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-add']);
            if (!$role->hasPermissionTo('dispatch-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-add');
        }
        if ($request->has('dispatch-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-edit']);
            if (!$role->hasPermissionTo('dispatch-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-delete');
        }
        if ($request->has('dispatch-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'service-delete']);
            if (!$role->hasPermissionTo('dispatch-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-delete');
        }
        //Reminder Module
        if ($request->has('reminder-view')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-view']);
            if (!$role->hasPermissionTo('reminder-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-view');
        }
        if ($request->has('reminder-add')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-add']);
            if (!$role->hasPermissionTo('reminder-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-add');
        }
        if ($request->has('reminder-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-edit']);
            if (!$role->hasPermissionTo('reminder-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-delete');
        }
        if ($request->has('reminder-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-delete']);
            if (!$role->hasPermissionTo('reminder-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-delete');
        }
        //Policies Module
        if ($request->has('policies-view')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-view']);
            if (!$role->hasPermissionTo('policies-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-view');
        }
        if ($request->has('policies-add')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-add']);
            if (!$role->hasPermissionTo('policies-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-add');
        }
        if ($request->has('policies-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-edit']);
            if (!$role->hasPermissionTo('policies-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-delete');
        }
        if ($request->has('policies-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-delete']);
            if (!$role->hasPermissionTo('policies-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-delete');
        }
        //Template Module
        if ($request->has('template-view')) {
            $permission = Permission::firstOrCreate(['name' => 'template-view']);
            if (!$role->hasPermissionTo('template-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-view');
        }
        if ($request->has('template-add')) {
            $permission = Permission::firstOrCreate(['name' => 'template-add']);
            if (!$role->hasPermissionTo('template-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-add');
        }
        if ($request->has('template-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'template-edit']);
            if (!$role->hasPermissionTo('template-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-delete');
        }
        if ($request->has('template-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'template-delete']);
            if (!$role->hasPermissionTo('template-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-delete');
        }
        //People Module
        if ($request->has('people-view')) {
            $permission = Permission::firstOrCreate(['name' => 'people-view']);
            if (!$role->hasPermissionTo('people-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('people-view');
        }
        if ($request->has('people-add')) {
            $permission = Permission::firstOrCreate(['name' => 'people-add']);
            if (!$role->hasPermissionTo('people-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('people-add');
        }
        if ($request->has('people-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'people-edit']);
            if (!$role->hasPermissionTo('people-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('people-delete');
        }
        if ($request->has('people-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'people-delete']);
            if (!$role->hasPermissionTo('people-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('people-delete');
        }
        //Report Module
        if ($request->has('report-daily')) {
            $permission = Permission::firstOrCreate(['name' => 'report-daily']);
            if (!$role->hasPermissionTo('report-daily')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('report-daily');
        }
        if ($request->has('report-weekly')) {
            $permission = Permission::firstOrCreate(['name' => 'report-weekly']);
            if (!$role->hasPermissionTo('report-weekly')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('report-weekly');
        }
        if ($request->has('report-monthly')) {
            $permission = Permission::firstOrCreate(['name' => 'report-monthly']);
            if (!$role->hasPermissionTo('report-monthly')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('report-monthly');
        }
        if ($request->has('report-yearly')) {
            $permission = Permission::firstOrCreate(['name' => 'report-yearly']);
            if (!$role->hasPermissionTo('report-yearly')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('report-yearly');
        }

        return redirect()->back()->with('message', 'Permission are set successfully!');
    }
    public function addPermission(Request $request)
    {
        $role = $request->validate([
            'permission'    => 'required',
        ]);
        $role = new Permission();
        $role->name        =  $request['permission'];
        $role->guard_name  =  $request['guard_name'];
        $role->save();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function  createPermission(Request $request)
    {
        return view('role.create');
    }
    public function assignPermission(Request $request)
    {
        return view('role.role_has_permission');
    }
}
