<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ana Novak',
                'email' => 'ana@demo.si',
                'password' => Hash::make('geslo1234'),
            ],
            [
                'name' => 'Boris Kranjc',
                'email' => 'boris@demo.si',
                'password' => Hash::make('geslo1234'),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@demo.si',
                'password' => Hash::make('admin1234'),
            ],
        ]);
    }
}
