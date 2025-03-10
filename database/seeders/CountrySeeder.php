<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('countries')->insert([
          [
              'name' => 'United States',
              'slug' => 'united-states',
          ],
          [
              'name' => 'United Kingdom',
              'slug' => 'united-kingdom',
          ],
          [
              'name' => 'France',
              'slug' => 'france',
          ],
          [
              'name' => 'Germany',
              'slug' => 'germany',
          ],
          [
              'name' => 'Italy',
              'slug' => 'italy',
          ],
        ]);
    }
}
