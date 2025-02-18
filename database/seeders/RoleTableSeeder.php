<?php

namespace Database\Seeders;

use App\Helpers\Helper;
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
        'Admin',
        'Yacht',
        'Supplier',
        'Crew',
        'Freelancer',
       ];

       foreach ($roles as $role) {
        DB::table('roles')->insert([
            'name' => $role,
            'slug' => Helper::generateUniqueSlug($role, 'roles'),
        ]);
       }
    }
}
