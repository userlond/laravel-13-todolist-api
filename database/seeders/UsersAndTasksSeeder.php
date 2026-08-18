<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersAndTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 users with 50 tasks each
        User::factory()
            ->count(5)
            ->has(
                Task::factory()
                    ->count(50)
            )
            ->create();
    }
}
