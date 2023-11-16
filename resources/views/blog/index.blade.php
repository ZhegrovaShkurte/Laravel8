 @extends('layouts.app')
@section('content')


@if (session()->has('message'))
  <div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
        {{ session()->get('message') }}
    </p>

@endif

<header class="py-7 bg-light border-bottom">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bolder">Welcome to Blog Page<h1>
            <p class="lead mb-0">Some of my Posts!!</p>
        </div>
    </div>
</header>
<br>
@if (Auth::check())
<div class="right">
  <!-- <div class="pt-15 w-4/5 m-auto"> -->
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
</div>
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
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset( $post->media()->where('type','post')->first()?->path) }}" width="300px" alt="" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{ $post->description }}</p> 
                        </section>
                        
                        @if($post->isUserLike(Auth::user()->id))
                        <a href ="/like/{{$post->id}}" class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 cursor-pointer">Unlike</a>
                      @else  
                      <a href ="/like/{{$post->id}}" class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 cursor-pointer">Like</a>
                    @endif

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                      </svg>
                      {{count($post->likes)}}

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                      </svg>
                      {{ count($post->comments)}}

                         <br>
                         <br>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More-></a>

                         @php
                             $userId = Auth::id();
                         @endphp
                             
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                        <span class="float-right">
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-secondary">Edit</a>
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