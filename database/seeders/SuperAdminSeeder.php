<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'colquhoun.r@gmail.com'],
            [
                'name' => 'Rob Colquhoun',
                'password' => Hash::make(Str::random(16)),
            ]
        );

        $superAdminRole = Role::where('slug', 'super_admin')->first();

        if ($superAdminRole && ! $user->roles()->where('roles.id', $superAdminRole->id)->exists()) {
            $user->roles()->attach($superAdminRole->id);
        }
    }
}
