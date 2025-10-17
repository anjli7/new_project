<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Anjali Kushwaha',
            'email' => 'anjalikushwah1207@gmail.com',
            'number' => '9812345678',
            'password' => \Illuminate\Support\Facades\Hash::make('admin@12345'),
            'role' => 'admin',
        ]);
    }
}
