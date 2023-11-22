@extends('home\db')
@section('db')

<h6>@lang('auth.data')</h6>
<br>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif
<a href="{{ route('create',  app()->getLocale()) }}"class="btn btn-primary btn-sm">Add User</a>
<br>
<br>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Profile Image</th>
    <th>Actions</th>
  </tr>
  <tbody>
    @foreach ($users as $user)
  <tr>
    <td>{{ $user->id}}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
     <td><img src="{{ asset( $user->medias()->where('type','profile')->first()?->path) }}" width="100px"></td> 
    <td><div class="col-md-6">
    <a href="{{ route('users.edit',$user->id) }}"class="btn btn-primary btn-sm">Edit</a>
      <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
          </div>
          </td> 
        </tbody>
    </tr>
 
  @endforeach
</table>


@endsection