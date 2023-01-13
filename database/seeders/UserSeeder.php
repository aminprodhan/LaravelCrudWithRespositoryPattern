<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test@example.com'),
        ],
        [
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'password' => Hash::make('test2@example.com'),
        ],
        [
            'name' => 'Test User3',
            'email' => 'test3@example.com',
            'password' => Hash::make('test3@example.com'),
        ]]);
    }
}
