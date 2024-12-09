<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		// An array filled by subcategories
		$subcategories = [
			'Hoodies', 'Jackets', 'Shirts', 'Pants', 'Shorts', 'Socks', 'All Clothes',
			'Sneakers', 'Boots', 'Slippers', 'All Shoes',
			'Hats & Caps', 'Bags', 'Sunglasses', 'Gloves', 'Scarves', 'All Accessories'
		];
		
		// Seeding database with creating some Subcategory object
		for ($i = 0; $i < count($subcategories); $i++) {
			// Assign each subcategory with its own category
			if ($i >= 0 && $i <= 6) {
				$category_id = 2;
			} else if ($i >= 7 && $i <= 10) {
				$category_id = 3;
			} else if ($i >= 11 && $i <= 16) {
				$category_id = 4;
			} else {
				$category_id = 1;
			}
			Subcategory::create([
				'name' => $subcategories[$i],
				'category_id' => $category_id,
				'created_at' => now(),
				'updated_at' => now()
			]);
		}
    }
}
