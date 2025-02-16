<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $roles = [
        'admin',
        'yacht',
        'supplier',
        'crew',
        'freelancer',
       ];

       foreach ($roles as $role) {
        DB::table('roles')->insert([
            'name' => $role,
            'slug' => Str::slug($role),
        ]);
       }
    }
}
