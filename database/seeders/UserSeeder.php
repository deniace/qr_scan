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
        User::factory()->create([
            'name' => 'Panitia',
            'username' => 'panitia',
            'password' => Hash::make('panitia'),
        ]);

        User::factory()->create([
            'name' => 'Vendor',
            'username' => 'vendor',
            'password' => Hash::make('vendor'),
        ]);
    }
}
