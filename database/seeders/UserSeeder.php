<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		User::create([
			'name' => 'Root',
			'username' => 'root',
			'address' => 'Unknown',
			'email' => 'root@root.com',
			'phone_number' => '08xxxxxxxxxx',
			'password' => 'root'
		]);
    }
}
