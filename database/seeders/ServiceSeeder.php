<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('services')->insert([
            [
                'user_id' => 1,
                'sku' => 'sku-1',
                'slug' => 'slug-1',
                'price' => 100,
                'discount' => 10,
                'about' => 'about-1',
                'product_name' => 'product-1',
                'quantity' => 5,
            ],
            [
                'user_id' => 2,
                'sku' => 'sku-2',
                'slug' => 'slug-2',
                'discount' => 20,
                'price' => 200,
                'about' => 'about-2',
                'product_name' => 'product-2',
                'quantity' => 10,
            ],
            [
                'user_id' => 3,
                'sku' => 'sku-3',
                'slug' => 'slug-3',
                'discount' => 30,
                'price' => 300,
                'about' => 'about-3',
                'product_name' => 'product-3',
                'quantity' => 15,
            ],
            [
                'user_id' => 4,
                'sku' => 'sku-4',
                'slug' => 'slug-4',
                'discount' => 40,
                'price' => 400,
                'about' => 'about-4',
                'product_name' => 'product-4',
                'quantity' => 20,
            ],
            [
                'user_id' => 5,
                'sku' => 'sku-5',
                'slug' => 'slug-5',
                'discount' => 50,
                'price' => 500,
                'about' => 'about-5',
                'product_name' => 'product-5',
                'quantity' => 25,
            ],
        ]);

    }
}
