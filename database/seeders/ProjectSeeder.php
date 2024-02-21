<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Boolando',
                'description' => 'Zalando remake',
                'languages' => 'HTML + CSS',
                'repo_url' => 'https://github.com/MatTeo-BT/html-css-boolando'
            ],
            [
                'name' => 'Boolzapp',
                'description' => 'Whatsapp remake',
                'languages' => 'HTML + CSS + JS Vanilla',
                'repo_url' => 'https://github.com/MatTeo-BT/Vue-Boolzapp'
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
