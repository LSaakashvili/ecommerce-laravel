@extends('admin.layouts.index')

@section('content')
<h2 class="text-danger">Edit User</h2>

<form method="POST">
    @csrf
    <label class="mt-4">User Name</label>
    <input name="name" type="text" class="form-control" placeholder="Johnsins" value="{{ $user->name }}">
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <label class="mt-4">User Email</label>
    <input name="email" type="text" class="form-control" placeholder="Johnsins@gmail.com" value="{{ $user->email }}">
    @error('email')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <label class="mt-4">User Password</label>
    <input name="password" type="password" class="form-control" placeholder="********">
    @error('password')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <select class="form-select w-100 mt-4" name="user_type">
        <option value="user" 
        @if ($user->user_type === 'user')
            selected
        @endif
        >User</option>
        <option value="admin"
        @if ($user->user_type === 'admin')
            selected
        @endif
        >Admin</option>
    </select>
    @if (session()->has('success'))
        <p class="text-success">{{ session()->get('success') }}</p>
    @endif
    <button type="submit" class="btn btn-danger w-100" style="margin-top:80px">Edit</button>
</form>
@endsection