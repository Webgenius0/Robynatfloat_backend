<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('experiences')->insert([
           [
               'user_id' => 1,
               'position' => 'Software Engineer',
               'company' => 'Google',
               'from' => '2020-01-01',
               'to' => '2021-01-01',
               'about' => 'Worked on a project for Google.',
           ],
           [
               'user_id' => 2,
               'position' => 'Software Engineer',
               'company' => 'Amazon',
               'from' => '2021-01-01',
               'to' => '2022-01-01',
               'about' => 'Worked on a project for Amazon.',
           ],
           [
               'user_id' => 3,
               'position' => 'Software Engineer',
               'company' => 'Microsoft',
               'from' => '2022-01-01',
               'to' => '2023-01-01',
               'about' => 'Worked on a project for Microsoft.',
           ],

        ]);
    }
}
