@extends('halaman_auth.dashboard') 

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="code">Product Code</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="size">Size</label>
            <input type="number" name="size" id="size" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="in_stock">In Stock</label>
            <input type="text" name="in_stock" id="in_stock" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="photo">Product Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
    
</div>
@endsection
