<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YachtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yachts')->insert([
            [
                'name' => 'Yacht 1',
                'slug' => 'yacht-1',
                'yacht_type_id' => 1,
                'built_year' => '2020-01-01',
            ],
            [
                'name' => 'Yacht 2',
                'slug' => 'yacht-2',
                'yacht_type_id' => 2,
                'built_year' => '2021-01-01',
            ],
            [
                'name' => 'Yacht 3',
                'slug' => 'yacht-3',
                'yacht_type_id' => 3,
                'built_year' => '2022-01-01',
            ],
            [
                'name' => 'Yacht 4',
                'slug' => 'yacht-4',
                'yacht_type_id' => 4,
                'built_year' => '2023-01-01',
            ],
            [
                'name' => 'Yacht 5',
                'slug' => 'yacht-5',
                'yacht_type_id' => 5,
                'built_year' => '2024-01-01',
            ],
        ]);
    }
}
