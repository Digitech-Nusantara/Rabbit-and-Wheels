<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Carbon\Carbon;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$this->getDataAPI();
    }

	private function getDataAPI() {
		// Create GuzzleHttp\Client object for consuming API
		$client = new Client();

		// Request data list product from API
		$response_list = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/products/list?country=us&lang=en&currentpage=0&pagesize=30&concepts=H%26M%20MAN', [
			'headers' => [
				'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
				'x-rapidapi-key' => '1cf5bbf6f8msh9db8d48c0fd35f2p1db252jsnea89d756248e',
			],
		]);
		
		// Get and format data list product as response from API
		$data_list = json_decode($response_list->getBody(), true);

		// Create ExchangeRate object for converting currency (not used yet)
		//$exchangeRates = app(ExchangeRate::class);

		// Insert data product to database one by one
		foreach ($data_list['results'] as $product) {
			// Request data detail of related product from API
			$response_detail = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/products/detail?lang=en&country=us&productcode='.$product['defaultArticle']['code'], [
				'headers' => [
					'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
					'x-rapidapi-key' => '1cf5bbf6f8msh9db8d48c0fd35f2p1db252jsnea89d756248e',
				],
			]);
			// Get and format data list product as response from API
			$data_detail = json_decode($response_detail->getBody(), true);

			// Get subcategory_id to assign to attribute subcategory_id for later (cannot used yet)
			//$subcategory_id = DB::table('subcategories')->select('id')->where('name', '=', $data_detail['product']['mainCategory']['name'])->first()->id;

			$subcategories = DB::table('subcategories')->get();
			$subcategory_id = 0;
			foreach ($subcategories as $subcategory) {
				if (Str::of($product['name'])->contains($subcategory->name, ignoreCase: true)) {
					$subcategory_id = $subcategory->id;
					break;
				} else {
					$subcategory_id = 1;
				}
			}

			// Inserting product data into database with creating Product object
			Product::create([
				'code' => $product['defaultArticle']['code'],
				'name' => $product['name'],
				'slug' => Str::of($product['name'])->slug('-'),
				'price' => $product['price']['value'],
				'size' => 0,
				'color' => $data_detail['product']['color']['rgbColor'],
				'in_stock' => $data_detail['product']['inStock'] ? 'In Stock' : 'Not Available',
				'photo' => $product['images'][0]['baseUrl'],
				'description' => $data_detail['product']['description'],
				'subcategory_id' => $subcategory_id,
				'created_at' => now(),
				'updated_at' => now()
			]);
		}	
	}
}
