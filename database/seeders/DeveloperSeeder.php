<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            ['name' => 'Hamza ', 'work_size' => 1],
            ['name' => 'Ali', 'work_size' => 2],
            ['name' => 'John', 'work_size' => 3],
            ['name' => 'Jason', 'work_size' => 4],
            ['name' => 'Necole', 'work_size' => 5],
        ];

        foreach ($developers as $developer) {
            Developer::create($developer);
        }
    }
}
