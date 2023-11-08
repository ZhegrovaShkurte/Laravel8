@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Update Post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
         

    <section class="mt-3">
        <form method="POST" action="/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

    <div class="card p-3">
        <label for="floatingInput">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $post->title }}"> 
        <label for="floatingTextArea">Description</label>
        <textarea class="form-control" name="description" id="floatingTextarea" cols="30" rows="10">{{ $post->description }}</textarea>  
    </div>
    <button class="btn btn-primary m-3">Submit Post</button>
        </form>
    </section>
</div>






@endsection