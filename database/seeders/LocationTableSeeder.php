<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('locations')->insert([
            [
            'user_id' => '2',
            'city_id' => '1',
            'latitude' => '37.7749',
            'longitude' => '-122.4194',
            ],
            [
            'user_id' => '3',
            'city_id' => '2',
            'latitude' => '40.7128',
            'longitude' => '-74.0060',
            ]
        ]);
    }
}
