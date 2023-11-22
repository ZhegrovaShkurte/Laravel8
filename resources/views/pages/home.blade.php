@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-3">
                <b>  @lang('auth.title') </b>
                <div class="row mb-0">
                    <div class="col-md-6">
                <a href="{{ route('edit', ['locale' => app()->getLocale()]) }}" class="btn btn-success">@lang('auth.edited')</a>
                    </div>
                     <br><br>
                    <div class="row mb-0">
                        <div class="col-md-6">
                 <a href="{{ route('posts.index' , ['locale' => app()->getLocale()]) }}" class="btn btn-primary">@lang('auth.post')</a> 
                        </div>  
                </div>
                </div>
    </div>
</div>
                
@endsection