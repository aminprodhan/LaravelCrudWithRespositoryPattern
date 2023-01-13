<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([[
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('customer@example.com'),
        ],
        [
            'name' => 'Customer 2',
            'email' => 'customer2@example.com',
            'password' => Hash::make('customer2@example.com'),
        ],
        [
            'name' => 'Customer 3',
            'email' => 'customer3@example.com',
            'password' => Hash::make('customer3@example.com'),
        ]]);
    }
}
