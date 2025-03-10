<?php

namespace Database\Seeders;

use Database\Seeders\CityTableSeeder;
use Database\Seeders\CountryTableSeeder;
use Database\Seeders\ExperienceTableSeeder;
use Database\Seeders\LocationTableSeeder;
use Database\Seeders\ProductTableSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ServiceTableSeeder;
use Database\Seeders\StateTableSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\UserYachatTableSeeder;
use Database\Seeders\YachtTableSeeder;
use Database\Seeders\YachtTypeTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(YachtTypeTableSeeder::class);
        $this->call(YachtTableSeeder::class);
        $this->call(UserYachatTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ExperienceTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(LocationTableSeeder::class);
    }
}
