<?php

namespace Database\Seeders;

use App\Models\Employment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employment::create([
            'dateRange'   => '',
            'companyName' => 'Company Name',
            'companyLink' => 'https://example.com',
            'typeJob'     => 'job type',
            'position'    => 'full-stack developer',
            'library'     => 'Laravel',
            'langs'       => 'Python',
            'stack'       => 'full',
            'additions'   => 'some text'
        ]);
    }
}
