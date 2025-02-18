<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'first_name' => 'Emon',
                'last_name' => 'Howlader',
                'handle' => 'emon',
                'email' => 'emon.tkgl@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
            ],
            [
                'first_name' => 'Shadin',
                'last_name' => 'Hafizur',
                'handle' => 'rahaman',
                'email' => 'shadin@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ],
            [
                'first_name' => 'imrul',
                'last_name' => 'kayes',
                'handle' => 'tushar',
                'email' => 'tushar@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
            [
                'first_name' => 'helal',
                'last_name' => 'uddin',
                'handle' => 'helal1',
                'email' => 'helal@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 4,
            ],
            [
                'first_name' => 'Rifat',
                'last_name' => 'shekh',
                'handle' => 'shekh rifat',
                'email' => 'rifat@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 5,
            ],


        ]);
    }
}
