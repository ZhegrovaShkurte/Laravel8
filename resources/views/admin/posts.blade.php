@extends('home\db')
@section('db')

<br>
<h6>Data related for Posts</h6>
<br>


<table class="table">
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>User</th>
      <th>Comments</th>
    </tr>
    <tbody>
        @foreach ($posts as $post)
        @foreach ($post->comments as $comment)
      <tr>
        <td>{{ $post->title}}</td>
        <td>{{ $post->description }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ count($post->comments)}}</td>
    </tbody>
</tr>
@endforeach
@endforeach
</table>

@endsection