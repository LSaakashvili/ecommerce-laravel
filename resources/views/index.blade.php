@extends('layouts.index')

@section('title', 'Main')

@section('content')
<div class="bg-white px-2 sm:px-4 py-2.5">
    <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-14 mx-auto">
        @foreach ($products as $product)
        <div class="w-full h-56 border-2 border-gray-200 rounded-lg flex flex-col items-center">
            <img src="{{ URL::asset('img/'.$product->image)}}" class="h-36 pt-2"/>
            <div class="flex justify-between w-full px-6 mt-2 items-center">
                <div>
                    <h2 class="text-bold font-semibold">{{ $product->name }}</h2>
                    <h4 class="text-sm text-red">{{ $product->price }} USD</h4>
                </div>
                <a type="button" href="/cart/add/{{ $product->id }}" class="text-white flex items-center cursor-pointer rounded-lg h-12 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mt-2">Add to cart</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection