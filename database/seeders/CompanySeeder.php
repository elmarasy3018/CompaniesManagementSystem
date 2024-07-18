<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'JumpPeak',
                'email' => 'jumppeak@jumppeak.com',
                'website' => 'jumppeak.com',
            ],
            [
                'name' => 'HP',
                'email' => 'hp@hp.com',
                'website' => 'hp.com',
            ],
            [
                'name' => 'WE',
                'email' => 'we@we.com',
                'website' => 'we.com',
            ],
        ];

        foreach ($companies as $company) {
            $model = Company::create($company);
            $model->addMedia(public_path('/seed/' . $company['name'] . '.jpg'))->usingName($company['name'])->preservingOriginal()->toMediaCollection('company');
        }
    }
}
