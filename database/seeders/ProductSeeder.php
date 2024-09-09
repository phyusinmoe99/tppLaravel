<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product1',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>10000
            ],
            [
                'name' => 'Product2',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>30000
            ],
            [
                'name' => 'Product3',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],
            [
                'name' => 'Product4',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],
            [
                'name' => 'Product5',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],
            [
                'name' => 'Product6',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],
            [
                'name' => 'Product7',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],
            [
                'name' => 'Product8',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia asperiores nam libero repellendus enim molestias aspernatur',
                'price'=>40000
            ],

        ];
        foreach($products as $product){
            Product::create($product);

        }
    }
}
