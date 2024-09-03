<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming your admin is in the User model

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Check if admin user already exists to avoid duplicate entries
        $admin = User::where('email', 'arderguller@gmail.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Arder Guller',
                'email' => 'arderguller@gmail.com',
                'password' => Hash::make('123456'), // You can hash the password here
                'is_admin' => 1, // Setting this user as admin
                'is_delete' => 0, // Default value
                'status' => 0, // Assuming 1 means active or enabled
            ]);
        }
    }
}
