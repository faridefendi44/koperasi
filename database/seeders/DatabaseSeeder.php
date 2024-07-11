<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = [
            [
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'role'=>'admin',
                'name' => 'Admin',
                'password' => bcrypt('123')
            ],
            [
                'email' => 'user@gmail.com',
                'username' => 'user',
                'role'=>'user',
                'name' => 'User',
                'password' => bcrypt('123')
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
