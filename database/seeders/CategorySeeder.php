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
        $category = [
            [
                'name' => 'Information Technology'
            ],
            [
                'name' => 'Travel'
            ],
            [
                'name' => 'Health&Fitness'
            ],
            [
                'name' => 'Food&Recipes'
            ],
        ];
        foreach ($category as $c) {
            Category::create($c);
        }
    }
}
