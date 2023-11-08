 @extends('layouts.app')
@section('content')


@if (session()->has('message'))
  <div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
        {{ session()->get('message') }}
    </p>

@endif

@if (Auth::check())
  <div class="pt-15 w-4/5 m-auto">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
  </div>
@endif


@foreach ($posts as $post)
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Created on {{ date('jS M Y', strtotime($post->updated_at)) }}, By {{ $post->user->name }}</div>
                           
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{ $post->description }}</p> 
                        </section>

                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Keep Reading</a>

                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                        <span class="float-right">
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-secondary">
                                        Edit </a>
                        </span>

                        <span class="float-right">
                            <form action="/posts/{{ $post->slug }}"
                                method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </span>
                        @endif
                    </article>
                </div>   
        </div>
@endforeach

    </body>
</html>
 @endsection