<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('products')->insert([
           [
               'user_id' => 1,
               'sku' => 'ABC123',
               'slug' => 'product-1',
               'quantity' => 10,
               'price' => 100.00,
               'discount' => 0.00,
               'about' => 'Product 1 description',
           ],
           [
               'user_id' => 2,
               'sku' => 'DEF456',
               'slug' => 'product-2',
               'quantity' => 5,
               'price' => 50.00,
               'discount' => 0.00,
               'about' => 'Product 2 description',
           ],
           [
               'user_id' => 3,
               'sku' => 'GHI789',
               'slug' => 'product-3',
               'quantity' => 8,
               'price' => 80.00,
               'discount' => 0.00,
               'about' => 'Product 3 description',
           ],
           [
               'user_id' => 4,
               'sku' => 'JKL012',
               'slug' => 'product-4',
               'quantity' => 15,
               'price' => 120.00,
               'discount' => 0.00,
               'about' => 'Product 4 description',
           ],
           [
               'user_id' => 5,
               'sku' => 'MNO345',
               'slug' => 'product-5',
               'quantity' => 12,
               'price' => 150.00,
               'discount' => 0.00,
               'about' => 'Product 5 description',
           ]

        ]);
    }
}
