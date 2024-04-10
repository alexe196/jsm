<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TaskStatus::factory()->create(
            ['name' => 'process']
        );
        \App\Models\TaskStatus::factory()->create(
            ['name' => 'error']
        );
        \App\Models\TaskStatus::factory()->create(
            ['name' => 'ready']
        );
    }
}
