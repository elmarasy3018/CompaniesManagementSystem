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

        Permission::create(['name' => 'Edit Roles']);
        Permission::create(['name' => 'Use Dashboard']);
        Permission::create(['name' => 'Use API']);
        Permission::create(['name' => 'create_company']);
        Permission::create(['name' => 'edit_company']);
        Permission::create(['name' => 'delete_company']);
        Permission::create(['name' => 'create_employee']);
        Permission::create(['name' => 'edit_employee']);
        Permission::create(['name' => 'delete_employee']);

        $super_user = Role::create(['name' => 'Super User']);
        $super_user->syncPermissions(['Edit Roles', 'Use Dashboard', 'Use API', 'create_company', 'edit_company', 'delete_company', 'create_employee', 'edit_employee', 'delete_employee']);

        $company_user = Role::create(['name' => 'Company Admin']);
        $company_user->syncPermissions(['Use Dashboard', 'create_company', 'edit_company', 'delete_company']);

        $employee_user = Role::create(['name' => 'Employee Admin']);
        $employee_user->syncPermissions(['Use Dashboard', 'create_employee', 'edit_employee', 'delete_employee']);

        $api_user = Role::create(['name' => 'API User']);
        $api_user->syncPermissions(['Use API']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole(['Super User']);
    }
}
