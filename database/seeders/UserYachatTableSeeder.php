<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserYachatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_yacht')->insert([
            [
                'user_id' => 1,
                'yacht_id' => 1,
            ],
            [
                'user_id' => 2,
                'yacht_id' => 2,
            ],
            [
                'user_id' => 3,
                'yacht_id' => 3,
            ],
            [
                'user_id' => 4,
                'yacht_id' => 4,
            ],
            [
                'user_id' => 5,
                'yacht_id' => 5,
            ],
        ]);
    }
}
