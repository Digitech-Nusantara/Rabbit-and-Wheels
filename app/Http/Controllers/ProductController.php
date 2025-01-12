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

	//START CODE CRUD
	public function index()
	{
		$products = Product::all(); // Ambil semua produk dari database
		return view('products.index', compact('products')); // Tampilkan ke view
	}
	

public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'code' => 'required|string|unique:products|max:255',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'size' => 'required|integer',
        'color' => 'required|string|max:50',
        'in_stock' => 'required|string|max:3', // 'Yes' atau 'No'
        'photo' => 'required|file|mimes:jpeg,png,jpg|max:10240', // Maks 10 MB
        'description' => 'required|string',
        'subcategory_id' => 'required|exists:subcategories,id',
    ]);

    // Generate slug dari nama produk
    $validatedData['slug'] = Str::slug($validatedData['name']);

    // Simpan file foto
    $photoPath = $request->file('photo')->store('photos/products', 'public');
    $validatedData['photo'] = $photoPath;

    // Simpan data ke database
    Product::create($validatedData);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Product berhasil ditambahkan.');
}

	public function create()
	{
    $subcategories = Subcategory::all(); // Ambil semua subkategori dari tabel
    return view('products.create', compact('subcategories'));
	}



	public function edit(Product $product)
	{
    return view('products.edit', compact('product'));
	}
    
	public function update(Request $request, Product $product)
{
    $request->validate([
        'code' => 'required|string|unique:products,code,' . $product->id,
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'size' => 'required|integer',
        'color' => 'required|string|max:255',
        'in_stock' => 'required|string|max:255',
        'photo' => 'nullable|file|mimes:jpeg,png,jpg|max:10240',
        'description' => 'required|string',
        'subcategory_id' => 'required|exists:subcategories,id',
    ]);

    // Update foto jika diunggah
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos/products', 'public');
        $product->update(array_merge($request->all(), ['photo' => $photoPath]));
    } else {
        $product->update($request->all());
    }

    return redirect()->route('products.index')->with('success', 'Product berhasil diperbarui.');
	}

	public function destroy(Product $product)
	{
    if ($product->photo) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($product->photo);
    }
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product berhasil dihapus.');
	}

//END CODE CRUD

	private function getDataProducts($category): View {
		$cat_id = 0;
		$title = '';
		$view = '';
		$categories = Category::select('*')->get();

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
				$products = Product::filter(request(['search']))->select(
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
				
				$newest = Product::select('products.name', 'products.photo', 'products.slug','categories.name as category_name')
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
		
		if (!empty(request('cat'))) {
			$products = $this->filter(request());
			return view('all-items-page', ['title' => 'All Items - Syrious', 'products' => $products, 'categories' => $categories]);
		}

		return view($view, ['title' => $title, 'products' => $products, 'newest' => $newest, 'categories' => $categories]);
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

		return view('detail-'.Str::lower($category->name), ['title' => $category->name . ' Details - Syrious', 'products' => $products, 'subcategory' => $subcategory]);
	}

	public function search(Request $request)
	{
		// If there's a search query
		if ($request->has('search') && !empty($request->search)) {
			$query = $request->search;

			// Get products matching the search query
			$products = Product::select('products.*', 'categories.name as category')
				->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
				->join('categories', 'categories.id', '=', 'subcategories.category_id')
				->where('products.name', 'like', '%' . $query . '%')
				->orWhere('products.slug', 'like', '%' . $query . '%')
				->limit(5)
				->get(['products.id', 'products.name', 'products.slug', 'products.photo', 'category']); // Only return relevant fields
		} else {
			$products = []; // Return an empty array if no query
		}

		// Return a JSON response to the front-end
		return response()->json($products);
	}
	
	private function filter(Request $request) {

		 $categories = $request->input('cat');
		// Build the query to get filtered products
        $query = Product::query();
		$query->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
			->join('categories', 'categories.id', '=', 'subcategories.category_id');

        // Apply category filter if selected
		if (!empty($request->category)) {
			$query->whereIn('categories.id', $categories);
		}

		// Debug SQL query
		//dd($query->toSql(), $query->getBindings());

		// Get the filtered products
		$products = $query->paginate(8);

		$products->appends(['cat' => $categories]);

		return $products;
	}
}
