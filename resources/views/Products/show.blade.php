@extends('halaman_auth.dashboard') 

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Category: {{ $product->category->name }}</p>
    
    <a href="{{ route('products.edit', $product) }}">Edit</a>
    
    <form action="{{ route('products.destroy', $product) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
