<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		// An array filled by subcategories
		$subcategories = [
			'Unknown',
			'Hoodie', 'Jacket', 'Shirt', 'Pants', 'Shorts', 'Sock', 'Sweater', 'Dress', 'All Clothes',
			'Sneaker', 'Boot', 'Slipper', 'All Shoes',
			'Hat & Cap', 'Bag', 'Sunglasses', 'Gloves', 'Jewellery', 'Watch', 'All Accessories'
		];
		
		// Seeding database with creating some Subcategory object
		for ($i = 0; $i < count($subcategories); $i++) {
			// Assign each subcategory with its own category
			if ($i >= 1 && $i <= 9) {
				$category_id = 2;
			} else if ($i >= 10 && $i <= 13) {
				$category_id = 3;
			} else if ($i >= 14 && $i <= 20) {
				$category_id = 4;
			} else {
				$category_id = 1;
			}
			Subcategory::create([
				'name' => $subcategories[$i],
				'slug' => Str::of($subcategories[$i])->slug('-'),
				'category_id' => $category_id,
				'created_at' => now(),
				'updated_at' => now()
			]);
		}
    }
}
