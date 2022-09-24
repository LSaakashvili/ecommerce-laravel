@extends('admin.layouts.index')

@section('content')
<h3 class="text-danger">Edit User</h3>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="/admin/user/remove/{{ $user->id }}" class="btn btn-danger">Remove</a>
            <a href="/admin/user/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (session()->has('success'))
    <h4 class="text text-success">{{ session()->get('success') }}</h4>
  @endif
@endsection