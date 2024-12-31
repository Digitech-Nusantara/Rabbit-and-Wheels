@extends('halaman_auth.dashboard') 


@section('header', 'Product List')

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->category ? $product->category->name : 'No Category' }}</td>
            <td>{{ $product->category ? $product->category->name : 'No Category' }}</td>
            <td>{{ $product->category ? $product->category->price : 'No Category' }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
