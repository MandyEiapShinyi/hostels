<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'password' => '123',
            'email' => '',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'mandy',
            'password' => '12345678',
            'email' => 'mandy@gmail.com',
            'role' => 'user',
        ]);
    }
}
