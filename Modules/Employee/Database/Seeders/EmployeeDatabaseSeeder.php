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
        $mohamed = Employee::create([
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
            'company_id' => Company::all()->random()->id,
        ]);
        $mohamed->addMediaFromUrl('https://i.pinimg.com/736x/73/e3/b3/73e3b3f901f4654905b781611eb62a4c.jpg')->usingName($mohamed->first_name)->toMediaCollection('employee');

        $ali = Employee::create([
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
            'company_id' => Company::all()->random()->id,
        ]);
        $ali->addMediaFromUrl('https://as2.ftcdn.net/v2/jpg/02/04/63/91/500_F_204639191_kk9AznqqILXxTIGA2WdYtkxZKnkxYhE9.jpg')->usingName($ali->first_name)->toMediaCollection('employee');
    }
}
