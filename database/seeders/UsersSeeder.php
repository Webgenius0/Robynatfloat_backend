<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder {
    public function run(): void {

        DB::table('users')->insert([
            [
                'first_name'        => 'admin',
                'last_name'         => 'admin',
                'handle'            => 'admin',
                'email'             => 'admin@admin.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 1,
            ],
            [
                'first_name'        => 'Emon',
                'last_name'         => 'Howlader',
                'handle'            => 'emon',
                'email'             => 'emon.tkgl@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 1,
            ],
            [
                'first_name'        => 'Hafizur',
                'last_name'         => 'Rahman',
                'handle'            => 'rahaman',
                'email'             => 'shadin666@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 2,
            ],
            [
                'first_name'        => 'imrul',
                'last_name'         => 'kayes',
                'handle'            => 'tushar',
                'email'             => 'tushar@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 3,
            ],
            [
                'first_name'        => 'helal',
                'last_name'         => 'uddin',
                'handle'            => 'helal1',
                'email'             => 'helal@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 4,
            ],
            [
                'first_name'        => 'Rifat',
                'last_name'         => 'shekh',
                'handle'            => 'shekh rifat',
                'email'             => 'rifat@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 5,
            ],
        ]);
    }
}
