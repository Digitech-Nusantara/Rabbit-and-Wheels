<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
		// Create GuzzleHttp\Client object for consuming API
		$client = new Client();

		// Request data list product from API
		$response_list = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/products/list?country=us&lang=en&currentpage=0&pagesize=30&concepts=H%26M%20MAN', [
			'headers' => [
				'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
				'x-rapidapi-key' => 'f8e4a9c12bmsh3d045d37eeb0f2ap11bbbdjsn69d5521db5b3',
			],
		]);
		
		// Get and format data list product as response from API
		$data_list = json_decode($response_list->getBody(), true);

		// Create ExchangeRate object for converting currency (not used yet)
		$exchangeRates = app(ExchangeRate::class);

		// Insert data product to database one by one
		foreach ($data_list['results'] as $product) {
			// Request data detail of related product from API
			$response_detail = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/products/detail?lang=en&country=us&productcode='.$product['defaultArticle']['code'], [
				'headers' => [
					'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
					'x-rapidapi-key' => 'f8e4a9c12bmsh3d045d37eeb0f2ap11bbbdjsn69d5521db5b3',
				],
			]);
			// Get and format data list product as response from API
			$data_detail = json_decode($response_detail->getBody(), true);

			// Get subcategory_id to assign to attribute subcategory_id for later (cannot used yet)
			//$subcategory_id = DB::table('subcategories')->select('id')->where('name', '=', $data_detail['product']['mainCategory']['name'])->first()->id;

			// Inserting product data into database with creating Product object
			Product::create([
				'name' => $product['name'],
				'price' => $product['price']['value'],
				'size' => 0,
				'color' => $data_detail['product']['color']['text'],
				'stock' => 0,
				'photo' => $product['images'][0]['baseUrl'],
				'description' => $data_detail['product']['description'],
				'subcategory_id' => 1,
				'created_at' => now(),
				'updated_at' => now()
			]);
		}
    }
}
