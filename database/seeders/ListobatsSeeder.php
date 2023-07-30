<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListobatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('listobats')->insert([
            [
                'code' => 'P1',
                'name' => 'Paracetamol',
                'harga' => 25000,
                'stock' => 0,
                'kategori' => 'demam,meriang',
                'satuan_id' => 1,
            ],
            [
                'code' => 'B1',
                'name' => 'Bodrek',
                'harga' => 2000,
                'stock' => 0,
                'kategori' => 'sakit kepala',
                'satuan_id' => 2,
            ],
            [
                'code' => 'PA1',
                'name' => 'Panadol',
                'harga' => 23000,
                'stock' => '0',
                'kategori' => 'kutu air',
                'satuan_id' => 3,
            ],
        ]);
    }
}
