<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
        'name' => 'Super Admin',
        'email' => 'superadmin@test.com',
        'password' => Hash::make('123456'),
        'role' => 'superadmin',
		'invited_users' => '', 
		]);

		User::create([
			'name' => 'Admin User',
			'email' => 'admin@test.com',
			'password' => Hash::make('123456'),
			'role' => 'admin',
			'invited_users' => '', 
		]);

		User::create([
			'name' => 'User',
			'email' => 'john@test.com',
			'password' => Hash::make('123456'),
			'role' => 'member',
			'invited_users' => '', 
		]);
    }
}
