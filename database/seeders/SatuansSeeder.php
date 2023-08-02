<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
                'name' => 'botol',
                'description' => 'botol adalah',
            ],
            [
                'name' => 'strip',
                'description' => 'strip adalah',
            ],
            [
                'name' => 'inhaler',
                'description' => 'inhaler adalah',
            ]
        ]);
    }
}

