<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'username' => 'alphison.',
            'password' => Hash::make('123123'),
            'role' => 'admin'
        ]);

        User::query()->create([
            'username' => 'user',
            'password' => Hash::make('123123'),
            'role' => 'user'
        ]);
    }
}
