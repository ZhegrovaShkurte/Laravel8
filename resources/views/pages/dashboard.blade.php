@extends('home\db')
@section('db')

<h1>Admin Dashboard</h1>

<table class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>RoleId</th>

    
  </tr>
  <tbody>
    @foreach ($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->roleid }}</td>
   
  </tr>
  @endforeach
</table>


@endsection