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
    @foreach ($user as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ $item->roleid }}</td>
   
  </tr>
  @endforeach
</table>


@endsection