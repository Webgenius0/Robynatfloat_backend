<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    public function run(): void {
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
                'slug' => Helper::generateUniqueSlug($role, 'roles'),
            ]);
        }
    }
}
