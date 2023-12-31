@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit-Register') }}</div>

                <div class="card-body">
                    <form action="update/profile" method="POST" action="{{ route('update.profile') }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">@lang('auth.name')</label>

                            <div class="col-md-6">
                                <input name="name" type="text" value="{{ auth()->user()->name}}"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">@lang('auth.phone')</label>

                        <div class="col-md-6">
                            <input name="phone" type="number" value="{{ auth()->user()->phone}}"/>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">@lang('auth.email')</label>

                            <div class="col-md-6">
                                <input name="email" type="email" value="{{ auth()->user()->email}}"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        

@endsection