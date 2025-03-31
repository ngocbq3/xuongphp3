<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            ['name' => 'Trắng', 'code'  => '#FFFFFF'],
            ['name' => 'Xanh', 'code'  => '#2b9e23'],
            ['name' => 'Đỏ', 'code'  => '#9e4723'],
            ['name' => 'Tím', 'code'  => '#9e238b'],
        ]);
    }
}
