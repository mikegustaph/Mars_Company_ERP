<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => "superAdmin",
            'email' => 'super@mars.com',
            'password' => bcrypt('admin')
        ]);
        $role = Role::create(['name' => 'superAdmin']);
        $permissions = Permission::pluck('id', 'id');
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
