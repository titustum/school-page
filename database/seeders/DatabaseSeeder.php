<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrInsert(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // hashed password
            ]
        );

        // Seed locations and schools
        $this->call([
            CountySeeder::class,
            SubcountySeeder::class,
            WardSeeder::class,
            SchoolSeeder::class,
        ]);
    }
}
