@extends('home\db')
@section('db')

<table class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    
  </tr>
  <tbody>
    @foreach ($user as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
   
  </tr>
  @endforeach
</table>


@endsection