<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    public function run(): void {
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
