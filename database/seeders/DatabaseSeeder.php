<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Space;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Space::factory()->count(10)->create();
    }
}
