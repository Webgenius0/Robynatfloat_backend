<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YachtTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$yachtTypes =
    [
        'Day Sailing Yachts',
        'Weekender Yachts',
        'Cruising Yachts',
        'Luxury Yachts',
        'Mega Yachts',
    ];

    foreach ($yachtTypes as $yachtType) {
        DB::table('yacht_types')->insert([
            'name' => $yachtType,
            'slug' => Str::slug($yachtType),
        ]);
    }

    }
}
