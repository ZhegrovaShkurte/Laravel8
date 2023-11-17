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
      <th>Likes</th>
      <th>Dislikes</th>
    </tr>
    <tbody>
        @foreach ($posts as $post)
      <tr>
        <td>{{ $post->title}}</td>
        <td>{{ $post->description }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->comments_count }}</td>
        <td>{{ $post->likes->where('reaction', 'like')->count() }}</td>
        <td>{{ $post->likes->where('reaction', 'dislike')->count() }}</td>
    </tbody>
</tr>

@endforeach
</table>

@endsection