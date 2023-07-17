<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Wahyu',
                'email' => 'wahyu@gmail.com',
                'role' => 'Admin',
                'password' => bcrypt('wahyu')
            ],
            [
                'name' => 'Dhila',
                'email' => 'dhila@gmail.com',
                'role' => 'Kasir',
                'password' => bcrypt('dhila')
            ]
        ]);
    }
}