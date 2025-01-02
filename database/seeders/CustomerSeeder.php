<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Customer::create([
			'name' => 'Whoever',
			'username' => 'whoever',
			'phone_number' => '08xxxxxxxxx',
			'address' => 'Whatever',
			'email' => 'who@ever.com',
			'password' => 'whoever'
		]);
    }
}
