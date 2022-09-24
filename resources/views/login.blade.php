@extends('layouts.index')

@section('title', 'Sign Up')

@section('content')

<div class="flex justify-center items-center mt-12">
  <h2 class="text-2xl">LOG IN</h2>
</div>


<div class="flex justify-center items-center mt-16">

<form class="lg:w-80" method="POST" action="/login">
  @csrf
    <div class="mb-6">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
      <input name="email" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
      @error('email')
          <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
      <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      @error('password')
          <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
      @if(session()->has('error'))
      <p class="text-sm text-red-600">{{ session()->get("error") }}</p>
      @endif
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>

</div>

@endsection