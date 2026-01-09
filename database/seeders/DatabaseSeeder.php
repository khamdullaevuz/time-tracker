<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
                                    'name' => 'Test User',
                                    'email' => 'test@example.com',
                                    'role' => UserRole::Admin
                                ]);

        User::factory(10)->create();

        Project::create([
            'name' => 'Sample Project',
            'description' => 'This is a sample project description.',
        ]);

        $this->call(TaskSeeder::class);
    }
}
