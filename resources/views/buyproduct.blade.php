@extends('layouts.index')

@section('title', 'Buy')

@section('content')
    <h2 class="text-3xl text-red-400">Buy Product</h2>
    <div class="flex md:p-8">
        <img src="{{ URL::asset('img/'.$product->image) }}" class="h-32">
        <div>
            <p class="text-2xl mt-4 md:ml-4">{{ $product->name }}</p>
            <p class="text-xl mt-2 md:ml-4">{{ $product->price }}$</p>
        </div>
    </div>
    <form class="lg:w-full mt-12" method="POST">
        @csrf
          <div class="mb-6">
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country</label>
            <input name="country" type="text" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="United States">
            @error('country')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">City</label>
            <input name="city" type="text" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="New York">
            @error('city')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
            <input name="address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4630 Pan American Freeway">
            @error('country')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Next</button>
        </form>
@endsection