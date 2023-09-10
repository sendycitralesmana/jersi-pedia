<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'password' => '$2y$10$HJ13LmImm3vjw1J6Nu7uuePIM9EiIdSD87eFIN6UUk7qf9SYY4SKm', 
            'role' => 1, 
            'phone' => "",  
            'address' => "",
        ]);
    }
}
