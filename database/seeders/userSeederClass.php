<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeederClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Define users
            $users = [
                [
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'phone' => '1234567890',
                    'pswd_non_hashed' => 'password123',
                    'profile_picture' => 'admin.png',
                    'country' => 'Country A',
                    'state' => 'State A',
                    'city' => 'City A',
                    'is_active' => true,

                ],
                [
                    'name' => 'Manager User',
                    'email' => 'manager@example.com',
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'phone' => '2345678901',
                    'pswd_non_hashed' => 'password123',
                    'profile_picture' => 'manager.png',
                    'country' => 'Country B',
                    'state' => 'State B',
                    'city' => 'City B',
                    'is_active' => true,

                ],
                [
                    'name' => 'Employee User',
                    'email' => 'employee@example.com',
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'phone' => '3456789012',
                    'pswd_non_hashed' => 'password123',
                    'profile_picture' => 'employee.png',
                    'country' => 'Country C',
                    'state' => 'State C',
                    'city' => 'City C',
                    'is_active' => true,


                ],
            ];

            // Insert users
            foreach ($users as $user) {
                User::firstOrCreate(['email' => $user['email']], $user);
            }


    }
}
