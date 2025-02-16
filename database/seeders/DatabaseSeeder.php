<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ RoleTableSeeder::class]);
        $this->call([UsersTableSeeder::class ]);
        $this->call([YachtTypeTableSeeder::class ]);
        $this->call([YachtTableSeeder::class ]);
        $this->call([UserYachatTableSeeder::class ]);
        $this->call([ProductTableSeeder::class ]);
        $this->call([ServiceTableSeeder::class ]);
        $this->call([ExperienceTableSeeder::class ]);
        $this->call([CountryTableSeeder::class ]);
        $this->call([StateTableSeeder::class ]);
        $this->call([CityTableSeeder::class ]);
        $this->call([LocationTableSeeder::class ]);


    }
}
