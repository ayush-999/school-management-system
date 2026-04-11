<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call PermissionSeeder first to create roles and permissions
        $this->call(PermissionSeeder::class);

        // User::factory(10)->create();

        $superAdmin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'user_type' => 'super_admin',
                'name' => 'Super Admin',
                'password' => Hash::make('Ayush@123'),
            ]
        );

        // Assign super_admin role to the super admin user
        $superAdmin->assignRole('super_admin');
    }
}
