@extends('halaman_auth.dashboard')

@section('title', 'Edit Category')

@section('header', 'Edit Kategori')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
