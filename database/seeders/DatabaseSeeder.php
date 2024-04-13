<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminUser;
use App\Models\Biscuit;
use Database\Factories\AdminUserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        Biscuit::factory(5)->create();

        AdminUser::factory(1)->create([
            "name" => "admin",
            "email" => "admin@mail.ru",
            "password" => bcrypt("admin")
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
