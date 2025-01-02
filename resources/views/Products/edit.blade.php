@extends('halaman_auth.dashboard')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input type="number" class="form-control" id="size" name="size" value="{{ $product->size }}" required>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="{{ $product->color }}" required>
        </div>
        <div class="mb-3">
            <label for="in_stock" class="form-label">Stock Status</label>
            <select class="form-control" id="in_stock" name="in_stock" required>
                <option value="Yes" {{ $product->in_stock == 'Yes' ? 'selected' : '' }}>In Stock</option>
                <option value="No" {{ $product->in_stock == 'No' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" width="100" class="mt-2">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
