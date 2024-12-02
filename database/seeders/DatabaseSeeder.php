<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'password' => '123',
            'email' => '',
            'role' => 'admin',
        ]);

        
    }
}
