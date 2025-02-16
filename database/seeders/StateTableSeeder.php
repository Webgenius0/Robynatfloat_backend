<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            [
                'name' => 'Abuja',
                'country_id' => 1,
                'slug' => 'abuja',
            ],
            [
                'name' => 'Abia',
                'country_id' => 1,
                'slug' => 'abia',
            ],
            [
                'name' => 'Adamawa',
                'country_id' => 1,
                'slug' => 'adamawa',
            ],
            [
                'name' => 'Akwa Ibom',
                'country_id' => 1,
                'slug' => 'akwa-ibom',
            ],
            [
                'name' => 'Anambra',
                'country_id' => 1,
                'slug' => 'anambra',
            ],
        ]);
    }
}
