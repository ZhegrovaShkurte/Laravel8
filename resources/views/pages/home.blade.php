@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-3">
                <b>Home Page...</b>
                <div class="row mb-0">
                    <div class="col-md-6">
                <a href="{{ route('edit') }}" class="btn btn-success">Edit</a>
                    </div>
                     <br><br>
                    <div class="row mb-0">
                        <div class="col-md-6">
                 <a href="{{ route('posts.index')}}" class="btn btn-primary">Posts</a> 
                        </div>  
                </div>
                </div>
    </div>
</div>
                
@endsection