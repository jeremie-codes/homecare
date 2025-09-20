<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'firstname' => 'Test',
            'lastname' => 'Client',
            'email' => 'client@gmail.com',
            'password'=> Hash::make('password'),
            'role' => 'client',
        ]);
        User::create([
            'firstname' => 'Test',
            'lastname' => 'Candidate',
            'email' => 'candidate@gmail.com',
            'password'=> Hash::make('password'),
            'role' => 'candidate',
        ]);
        User::create([
            'firstname' => 'Test',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
