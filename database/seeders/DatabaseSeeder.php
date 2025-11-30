<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'name' => 'Administrator',
        'email' => 'admin@gereja.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Bendahara Gereja',
        'email' => 'bendahara@gereja.com',
        'password' => Hash::make('password'),
        'role' => 'bendahara',
    ]);

    User::create([
        'name' => 'Pelayan Ibadah',
        'email' => 'pelayan@gereja.com',
        'password' => Hash::make('password'),
        'role' => 'pelayan',
    ]);

    User::create([
        'name' => 'Jemaat Biasa',
        'email' => 'jemaat@gereja.com',
        'password' => Hash::make('password'),
        'role' => 'jemaat',
    ]);
}
}
