<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $category = null, $productSlug = null)
    {
		if (!$productSlug) {
			$data = $this->getDataProducts($category);
		} else {
			$data = $this->getDetailProduct($productSlug);
		}
		return $data;
    }

	private function getDataProducts($category): View {
		$cat_id = 0;
		$title = '';
		$view = '';

		if ($category === null) {
			$category = 'home';
		}

		switch($category) {
			case 'clothes':
				$cat_id = 2;
				$title = 'Clothes - Syrious';
				$view = 'clothes-page';
				break;
			case 'shoes':
				$cat_id = 3;
				$title = 'Shoes - Syrious';
				$view = 'shoes-page';
				break;
			case 'accessories':
				$cat_id = 4;
				$title = 'Accessories - Syrious';
				$view = 'accesoris-page';
				break;
			case 'all-items':
				$cat_id = 1;
				$title = 'All Items - Syrious';
				$view = 'all-items-page';
				break;
			case 'home':
			default:
				$cat_id = 1;
				$title = 'Home - Syrious';
				$view = 'landing-page';
				break;
		}

		switch($cat_id) {
			case 1:
				$products = Product::select(
						DB::raw('MIN(products.id) as id'),
						DB::raw('MIN(products.code) as code'),
						DB::raw('MIN(products.color) as color'),
						DB::raw('MIN(products.photo) as photo'),
						DB::raw('MIN(products.price) as price'),
						DB::raw('MIN(categories.name) as category_name'),
						'products.name', 'products.slug', 'products.size',
						'products.in_stock', 'products.description')
					->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
					->join('categories', 'subcategories.category_id', '=', 'categories.id')
					->groupBy('products.name', 'products.slug', 'products.size',
						'products.in_stock', 'products.description')
					->orderBy('products.created_at', 'desc')
					->paginate(8);
				$newest = Product::select('products.name', 'products.photo', 'categories.name as category_name')
					->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
					->join('categories', 'subcategories.category_id', '=', 'categories.id')
					->orderBy('products.created_at', 'desc')->first();
				break;
			case 2:
			case 3:
			case 4:
				$products = Product::select(
						DB::raw('MIN(products.id) as id'),
						DB::raw('MIN(products.code) as code'),
						DB::raw('MIN(products.color) as color'),
						DB::raw('MIN(products.photo) as photo'),
						DB::raw('MIN(products.price) as price'),
						'products.name', 'products.slug', 'products.size',
						'products.in_stock', 'products.description')
					->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
					->join('categories', 'subcategories.category_id', '=', 'categories.id')
					->whereIn('products.subcategory_id', Subcategory::select('id')->where('category_id', $cat_id)->get())
					->groupBy('products.name', 'products.slug', 'products.size',
						'products.in_stock', 'products.description')
					->orderBy('products.id')->paginate(8);
				$newest = null;
				break;
		}

		return view($view, ['title' => $title, 'products' => $products, 'newest' => $newest]);
	}

	private function getDetailProduct($slug) {
		$products = Product::select('products.*')
			->where('products.slug', $slug)
			->orderBy('products.id')->get();
		$subcategory = Subcategory::select('subcategories.name')
			->join('products', 'subcategories.id', '=', 'products.subcategory_id')
			->where('products.slug', $slug)
			->first();
		$category = Category::select('categories.name')
			->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
			->whereIn('subcategories.name', $subcategory)
			->first();

		return view('detail-'.Str::lower($category->name), ['title' => $category->name.' Details - Syrious', 'products' => $products, 'subcategory' => $subcategory]);
	}
}
