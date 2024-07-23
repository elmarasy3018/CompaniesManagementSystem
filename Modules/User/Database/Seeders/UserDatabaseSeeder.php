<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        $permission = Permission::create(['name' => 'edit_user_roles']);
        $permission = Permission::create(['name' => 'create_company']);
        $permission = Permission::create(['name' => 'edit_company']);
        $permission = Permission::create(['name' => 'create_employee']);
        $permission = Permission::create(['name' => 'edit_employee']);
        $permission = Permission::create(['name' => 'use_dashboard']);
        $permission = Permission::create(['name' => 'use_api']);

        $super_user = Role::create(['name' => 'Super User']);
        $super_user->syncPermissions(['edit_user_roles', 'create_company', 'edit_company', 'create_employee', 'edit_employee', 'use_dashboard', 'use_api']);

        $company_user = Role::create(['name' => 'Company Admin']);
        $company_user->syncPermissions(['create_company', 'edit_company', 'use_dashboard']);

        $employee_user = Role::create(['name' => 'Employee Admin']);
        $employee_user->syncPermissions(['create_employee', 'edit_employee', 'use_dashboard']);

        $api_user = Role::create(['name' => 'API User']);
        $api_user->syncPermissions(['use_api']);

        $user->assignRole(['Super User']);
    }
}
