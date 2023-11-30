@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{ $post->title }} </h1>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
<article>
<div class="text-muted fst-italic mb-2">Created on {{ date('jS M Y', strtotime($post->updated_at)) }}, By {{ $post->user->name }}</div>

<section class="mb-5">
    <p class="fs-5 mb-4">{{ $post->description }}</p> 
</section>
</article>
<h4 class="fw-bolder"> Display Comments </h4>

@include('blog.comments', ['comments' => $post->comments, 'post_id' => $post->id])

<hr />
<h4>Add comment</h4>
<form method="post" action="{{ route('comments.store', ['post' => $post->id]) }}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="body"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Add Comment" />
    </div>
</form>
</div>
      
</div>
</div>
</div>

@endsection