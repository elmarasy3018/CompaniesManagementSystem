<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\Database\Seeders\EmployeeDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            EmployeeDatabaseSeeder::class,
        ]);
    }
}
