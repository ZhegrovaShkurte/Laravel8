@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Add Post</h1>

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
        <form method="POST" action="{{ route('posts.index') }}" enctype="multipart/form-data">
            @csrf

    <div class="card p-3">
        <label for="floatingInput">Title</label>
        <input class="form-control" type="text" name="title">
        <label for="floatingInput">Description</label>
        <input class="form-control" type="text" name="description">
        <label for="formFile" class="form-label">Add Image</label>
        <img src="" alt="" class="img-blog">
        <input class="form-control" type="file" name="image">
    </div>
    <button class="btn btn-primary m-3">Save</button>
        </form>
    </section>
</div>






@endsection