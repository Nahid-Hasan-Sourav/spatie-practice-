<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RollPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'admin']);

        $permissions=[
          ['name' => 'crteate user'],
          ['name' => 'edit user'],
          ['name' => 'update user'],
          ['name' => 'delete user'],
          ['name' => 'create role'],
          ['name' => 'edit role'],
          ['name' => 'update role'],
          ['name' => 'delete role'],

        ];

        foreach($permissions as $item){
            Permission::create($item);
        }

        $user = User::where('is_admin', 1)->first();
        $user->assignRole($role);
        $role->syncPermissions(Permission::pluck('id')->toArray());
        // if ($user) {
        //     $user->assignRole($role);
        // } else {
        //     echo "No admin user found. Please ensure you have an admin user with is_admin=1 in the database.";
        // }

    }
}
