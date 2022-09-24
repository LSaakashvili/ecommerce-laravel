@extends('admin.layouts.index')

@section('content')
<h3 class="text-danger">Orders</h3>
@if (session()->has('success'))
        <p class="text-success">{{ session()->get('success') }}</p>
    @endif
<table class="table table-striped mt-4 w-full">
    <thead>
      <tr>
        <th scope="col">City</th>
        <th scope="col">Address</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <th scope="row">{{ $order->city}}</th>
        <td>{{ $order->address }}</td>
        <td>{{ $order->productname }}</td>
        <td>
            <img src="{{ URL::asset('img/'.$order->productimage) }}" style="height:25px">
        </td>
        <td>
            <a href="/admin/order/completed/{{ $order->id }}" class="btn btn-success">Completed</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection