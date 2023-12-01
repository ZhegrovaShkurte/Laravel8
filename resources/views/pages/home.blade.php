@extends('layouts.app')
@section('content')
    <header class="masthead">
        <div class="container position-center">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-black">

                        <h1 class="mb-5">Welcome to Laravel-Blog</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="row mb-0">
                                    <div class="col-md-6">
                                        <a href="{{ route('dashboard') }}"
                                            class="btn btn-primary">Dashboard</a>
                                    </div>
                                    <br><br>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <a href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}"
                                                class="btn btn-primary">@lang('auth.post')</a>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row mb-0">
                                        <div class="col-md-6">
                                            <a href="{{ route('edit', ['locale' => app()->getLocale()]) }}"
                                                class="btn btn-success">@lang('auth.edited')</a>
                                        </div>
                                    </div>

    </header>
@endsection
