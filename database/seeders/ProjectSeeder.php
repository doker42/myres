<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name'        => 'project name',
            'link'        => 'http://example.com',
            'git_link'    => 'http://example.com',
            'img_name'    => 'http://example.com',
            'img_path'    => 'http://example.com',
            'skills'      => 'some skills',
            'description' => 'description',
            'status'      => true
        ]);
    }
}
