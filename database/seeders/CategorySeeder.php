<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'name' => 'Áo phông/ Áo thun'
        ]);
        Category::query()->create([
            'name' => 'Áo polo'
        ]);
        Category::query()->create([
            'name' => 'Áo sơ mi'
        ]);
        Category::query()->create([
            'name' => 'Áo chống nắng'
        ]);
    }
}
