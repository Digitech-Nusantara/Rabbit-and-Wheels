<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		// An array filled by categories
		$categories = ['Home', 'Clothes', 'Shoes', 'Accessories'];

		// Seeding database with creating some Category object
		foreach ($categories as $category) {
			Category::create([
				'name' => $category,
				'slug' => Str::of($category)->slug('-'),
				'created_at' => now(),
				'updated_at' => now()
			]);
		}
    }

	// Function for taking categories and its subcategories from API (But can't used)
	public function api(): void {
		$client = new Client();
		
		$response = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/categories/list?lang=en&country=us', [
			'headers' => [
				'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
				'x-rapidapi-key' => 'f8e4a9c12bmsh3d045d37eeb0f2ap11bbbdjsn69d5521db5b3',
			],
		]);

		$data = json_decode($response->getBody(), true);
		foreach ($data as $category) {
			Category::create([
				'name' => $category['CatName'],
				'slug' => Str::of($category['CatName'])->slug('-'),
				'created_at' => now(),
				'updated_at' => now()
			]);
			$category_id = DB::table('categories')->select('id')->where('name', '=', $category['CatName'])->first()->id;
			if (isset($category['CategoriesArray']) && is_array($category['CategoriesArray'])) {
				foreach ($category['CategoriesArray'] as $subcategory) {
					DB::table('subcategories')->insert([
						'name' => $subcategory['CatName'],
						'slug' => Str::of($subcategory['CatName'])->slug('-'),
						'category_id' => $category_id,
						'created_at' => now(),
						'updated_at' => now()
					]);
				}
			}
		}
	}
}
