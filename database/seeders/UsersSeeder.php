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
                'name' => 'Andre',
                'email' => 'andre@gmail.com',
                'role_id' => '1',
                'password' => bcrypt('andre')
            ],
            [
                'name' => 'dito',
                'email' => 'dito@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('dito')
            ]
        ]);
    }
}