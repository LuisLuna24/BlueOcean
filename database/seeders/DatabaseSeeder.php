<?php

namespace Database\Seeders;

use App\Models\type_users;
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
        type_users::create([
            'id' => 1,
            'nombre' => 'Admin',
        ]);

        type_users::create([
            'id' => 2,
            'nombre' => 'User',
        ]);

        user::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => 'Admin123#',
            'type_user_id' => 1, // 1=admin, 2=user
            'is_active' => true,
        ]);
    }
}
