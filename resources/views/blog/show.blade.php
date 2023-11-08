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
        </div>
    </div>
</div>

@endsection