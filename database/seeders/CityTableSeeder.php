<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            [
                'name' => 'Lagos',
                'country_id' => 1,
                'state_id' => 1,
                'slug' => 'lagos',
            ],
            [
                'name' => 'Abuja',
                'state_id' => 1,
                'slug' => 'abuja',
                'country_id' => 1,
            ],
            [
                'name' => 'Abia',
                'state_id' => 1,
                'slug' => 'abia',
                'country_id' => 1,
            ],
            [
                'name' => 'Adamawa',
                'state_id' => 1,
                'slug' => 'adamawa',
                'country_id' => 1,
            ],
            [
                'name' => 'Anambra',
                'state_id' => 1,
                'slug' => 'anambra',
                'country_id' => 1,
            ],
        ]);
    }
}
