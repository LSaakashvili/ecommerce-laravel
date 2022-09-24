@extends('admin.layouts.index')

@section('content')
<h3 class="text-danger">Edit User</h3>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row align-items-center">{{ $product->id }}</th>
        <td><img src="{{ URL::asset('img/'.$product->image) }}" style="height:35px"/></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="/admin/product/remove/{{ $product->id }}" class="btn btn-danger">Remove</a>
            <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (session()->has('success'))
    <h4 class="text text-success">{{ session()->get('success') }}</h4>
  @endif
@endsection