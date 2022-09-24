@extends('layouts.index')

@section('title', 'Cart')

@section('content')

<div class="container flex flex-wrap justify-between items-center mx-auto py-6">
    <h2 class="text-3xl">Cart</h2>
    <div class="flex w-auto justify-between">
        <p class="text-2xl">
            Total: {{ Cart::getTotal() }}$
        </p>
        @auth 
        <a @if (Cart::getTotal() > 0) href="/cart/buy" @endif>
            <button class="text-white h-10 w-24 ml-8 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-sm px-5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Buy
            </button>
        </a>
        @endauth
        @guest
        <a href="/signup">
            <button class="text-white h-10 w-24 ml-8 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-sm px-5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Buy
            </button>
        </a>
        @endguest
    </div>
</div>

<div class="container flex flex-wrap justify-between items-center mx-auto mt-14">
<table class="table w-full text-center justify-center">
    <thead>
      <tr>
        <th class="hidden md:table-cell">Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th class="hidden md:table-cell">Quantity</th>
        <th>Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cartItems as $item)
      <tr class="h-36 items-center">
        <td class="hidden md:table-cell">{{ $item->id }}</td>
        <td class="flex justify-center items-center">
            <img src={{ URL::asset('img/'.$item->attributes->image) }} class="h-24 mt-2"/>
        </td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td class="hidden md:table-cell">
            {{ $item->quantity }}
        </td>
        <td>
            <a href="/cart/remove/{{ $item->id }}">
                <button class="text-white h-8 bg-red-700 hover:bg-remove-800 focus:outline-none focus:ring-4 focus:ring-remove-300 font-medium text-sm px-5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Remove
                </button>
            </a>
            @auth
            <a href="/cart/buy/{{ $item->id }}">
                <button class="text-white h-8 bg-sky-700 hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-sky-300 font-medium text-sm px-5 text-center mr-2 mb-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                    Buy
                </button>
            </a>
            @endauth
            @guest
            <a href="/signup">
                <button class="text-white h-8 bg-sky-700 hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-sky-300 font-medium text-sm px-5 text-center mr-2 mb-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                    Buy
                </button>
            </a>
            @endguest
        <td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection