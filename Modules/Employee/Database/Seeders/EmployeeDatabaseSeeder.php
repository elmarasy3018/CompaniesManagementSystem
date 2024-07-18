<?php

namespace Modules\Employee\Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Modules\Employee\Entities\Employee;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'ar' => [
                    'first_name' => 'محمد',
                    'last_name' => 'مصطفى'
                ],
                'en' => [
                    'first_name' => 'Mohamed',
                    'last_name' => 'Mostafa'
                ],
                'email' => 'test@test.com',
                'phone' => '0512345678',
            ],
            [
                'ar' => [
                    'first_name' => 'علي',
                    'last_name' => 'علي'
                ],
                'en' => [
                    'first_name' => 'Ali',
                    'last_name' => 'Ali'
                ],
                'email' => 'test2@test.com',
                'phone' => '0512345679',
            ],
            [
                'ar' => [
                    'first_name' => 'أحمد',
                    'last_name' => 'عادل'
                ],
                'en' => [
                    'first_name' => 'Ahmed',
                    'last_name' => 'Adel'
                ],
                'email' => 'test3@test.com',
                'phone' => '0512345697',
            ],
        ];

        foreach ($employees as $employee) {
            $model = Employee::create($employee);
            $model->companies()->attach([Company::all()->random()->id]);
            $model->addMedia(public_path('/seed/' . $employee['en']['first_name'] . '.jpg'))->usingName($employee['en']['first_name'])->preservingOriginal()->toMediaCollection('employee');
        }
    }
}
