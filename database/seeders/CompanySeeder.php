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
        $jumppeak = Company::create([
            'name' => 'JumpPeak',
            'email' => 'jumppeak@jumppeak.com',
            'website' => 'jumppeak.com',
        ]);
        // $company->addMedia(storage_path('/seed_images/seed.jpg'))->usingName($company->name)->toMediaCollection('company');
        $jumppeak->addMediaFromUrl('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3c_EwEcR-vap1uHmqWTXTj4hotpS0Encltg&s')->usingName($jumppeak->name)->toMediaCollection('company');

        $hp = Company::create([
            'name' => 'HP',
            'email' => 'hp@hp.com',
            'website' => 'hp.com',
        ]);
        // $company->addMedia(storage_path('/seed_images/seed.jpg'))->usingName($company->name)->toMediaCollection('company');
        $hp->addMediaFromUrl('https://brandcentral.hp.com/content/dam/sites/brand-central/elem-logo/images/Logo_1_dont.jpeg')->usingName($hp->name)->toMediaCollection('company');
    }
}
