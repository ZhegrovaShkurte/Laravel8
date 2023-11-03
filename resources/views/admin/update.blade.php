@extends('layouts.app')
@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit-User') }}</div>

                <div class="card-body">
                    @if(Session::has('Success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('users.update',$user->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input name="name" type="text" value="{{$user->name}}"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input name="email" type="email" value="{{$user->email}}"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input name="phone" type="number" value="{{$user->phone}}"/>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                      
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            
                            <a href="{{route('dashboard')}}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                           
                    </div>
                        </div>


@endsection