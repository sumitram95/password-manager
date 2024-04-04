<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => "can change role and permisssion"]);
        Permission::create(['name' => "can view own profile only"]);
        Permission::create(['name' => "can view all"]);
        Permission::create(['name' => "can add user"]);
        Permission::create(['name' => "can edit user"]);
        Permission::create(['name' => "can delete user"]);
        Permission::create(['name' => "can add url"]);
        Permission::create(['name' => "can edit url"]);
        Permission::create(['name' => "can delete url"]);
        Permission::create(['name' => "can edit profile"]);
        Permission::create(['name' => "user can only access allowed like which has assigned role name is public"]);
        Permission::create(['name' => "user cannot access privacy like assign role name is private"]);

        $this->adminRoles();
        $this->userRoles();
        $this->publicRoles();
        $this->privateRoles();

    }

    private function userRoles()
    {

        $role = Role::create(['name' => "User"]);

        $permissions = Permission::where("name", "can view own profile only")->orWhere("name", "can edit profile")->orWhere("name", "can add url")->orWhere("name", "can delete url")->orWhere("name", "can edit url")->get();

        $role->syncPermissions($permissions);

    }

    private function adminRoles()
    {
        $role = Role::create(['name' => "Admin"]);

        $permissions = Permission::get();
        //-- Give all permissions to
        $role->syncPermissions($permissions);
    }

    private function publicRoles()
    {

        $role = Role::create(['name' => "Public"]);

        $permissions = Permission::where("name", "user can only access allowed like which has assigned role name is public")->get();

        $role->syncPermissions($permissions);

    }

    private function privateRoles()
    {

        $role = Role::create(['name' => "Private"]);

        $permissions = Permission::where("name", "user cannot access privacy like assign role name is private")->get();

        $role->syncPermissions($permissions);

    }

}
