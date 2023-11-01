@extends('home\db')
@section('db')

<h6>Data related to user and admin</h6>

<table class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Role_Id</th>

    
  </tr>
  <tbody>
    @foreach ($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->role_id }}</td>
   
  </tr>
  @endforeach
</table>


@endsection