@extends('layouts.index')

@section('title', 'Sign Up')

@section('content')

<div class="flex justify-center items-center mt-8">
    <h2 class="text-2xl">SIGN UP</h2>
</div>

<div class="flex justify-center items-center mt-16">

<form method="POST" action="/signup" class="lg:w-80">
  @csrf
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __("UserName") }}</label>
      <input name="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      @error('name')
          <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __("Email") }}</label>
      <input name="email" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      @error('email')
          <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __("Password") }}</label>
      <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      @error('password')
      <p class="text-sm text-red-600">{{ $message }}</p>
      @enderror      
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __("Confirm password") }}</label>
        <input name="confirmpassword" type="password" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        @error('confirmpassword')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>
     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>

@endsection