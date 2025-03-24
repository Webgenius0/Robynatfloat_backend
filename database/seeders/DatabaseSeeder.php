<?php

namespace Database\Seeders;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\ExperienceSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\UserYachtSeeder;
use Database\Seeders\YachtSeeder;
use Database\Seeders\YachtTypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(YachtTypeSeeder::class);
        $this->call(YachtSeeder::class);
        $this->call(UserYachtSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ExperienceSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(LanguageSeeder::class);
    }
}
