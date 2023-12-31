<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use App\Models\User;
use App\Models\Priode;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(30)->create();
        Candidate::factory(5)->create();
        Priode::factory()->create([
            'priode' => '2023/2024', // You may modify this based on your needs
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'name' => "Administrator",
            'username' => "admin1",
            'role' => 'admin',
            'gender' => 'Putra',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => "SantriCode",
            'username' => "admin2",
            'role' => 'admin',
            'gender' => 'Putra',
            'password' => Hash::make('admin2'),
            'remember_token' => Str::random(10),
        ]);
    }
}
