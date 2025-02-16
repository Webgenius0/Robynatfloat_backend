<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
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
            ],
            [
                'user_id' => 2,
                'sku' => 'sku-2',
                'slug' => 'slug-2',
                'discount' => 20,
                'price' => 200,
                'about' => 'about-2',
            ],
            [
                'user_id' => 3,
                'sku' => 'sku-3',
                'slug' => 'slug-3',
                'discount' => 30,
                'price' => 300,
                'about' => 'about-3',
            ],
            [
                'user_id' => 4,
                'sku' => 'sku-4',
                'slug' => 'slug-4',
                'discount' => 40,
                'price' => 400,
                'about' => 'about-4',
            ],
            [
                'user_id' => 5,
                'sku' => 'sku-5',
                'slug' => 'slug-5',
                'discount' => 50,
                'price' => 500,
                'about' => 'about-5',
            ],
        ]);

    }
}
