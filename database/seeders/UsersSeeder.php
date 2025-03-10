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
                'first_name'        => 'yacht',
                'last_name'         => 'yacht',
                'handle'            => 'yacht',
                'email'             => 'yacht@yacht.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 2,
            ],
            [
                'first_name'        => 'supplier',
                'last_name'         => 'supplier',
                'handle'            => 'supplier',
                'email'             => 'supplier@supplier.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 3,
            ],
            [
                'first_name'        => 'crew',
                'last_name'         => 'crew',
                'handle'            => 'crew',
                'email'             => 'crew@crew.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 4,
            ],
            [
                'first_name'        => 'freelancer',
                'last_name'         => 'freelancer',
                'handle'            => 'freelancer',
                'email'             => 'freelancer@freelancer.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'),
                'role_id'           => 5,
            ],
        ]);
    }
}
