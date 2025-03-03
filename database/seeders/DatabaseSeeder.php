<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoty;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Categoty::create([
            'id' => 1,
            'name' => 'politics'
        ]);
    }
}
