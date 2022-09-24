@extends('admin.layouts.index')

@section('content')
    <h2 class="text-danger">Add Product</h2>

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <label class="mt-4">Product Name</label>
        <input name="name" type="text" class="form-control" placeholder="Iphone 13...">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <label class="mt-4">Product Price</label>
        <input name="price" type="text" class="form-control" placeholder="1200">
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <label class="mt-4">Image</label>
        <input name="image" type="file" class="form-control">
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        @if (session()->has('success'))
            <p class="text-success">{{ session()->get('success') }}</p>
        @endif
        <button type="submit" class="btn btn-danger w-100" style="margin-top:80px">Add</button>
    </form>
@endsection