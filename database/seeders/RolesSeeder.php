<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['slug' => 'super_admin', 'name' => 'Super Admin'],
            ['slug' => 'teams_admin', 'name' => 'Teams Admin'],
            ['slug' => 'tekkie', 'name' => 'Tekkie'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'slug' => $role['slug'],
            ], [
                'name' => $role['name'],
            ]);
        }
    }
}
