<?php

namespace Database\Seeders;

use App\Models\GlobalUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class GlobalRolesAndSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superUserRole = Role::firstOrCreate(['name' => 'SuperUser', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Owner', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);

        $superUser = GlobalUser::firstOrCreate(
            ['email' => 'superuser@system.com'],
            [
                'id' => Str::uuid(),
                'name' => 'System Super User',
                'password' => Hash::make('SuperUser123!'),
                'email_verified_at' => now(),
            ]
        );

        $superUser->assignRole($superUserRole);
    }
}
