@extends('front.layouts.app')

@section('title', config('app.name'))

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            @if(session('url'))
                <div class="alert alert-success mb-2">
                    <b>@lang('Link'): </b>
                    <a href="{{ session('url') }}">{{ session('url') }}</a>
                </div>
            @endif
            @if($link = session('deactivatedLink'))
                <div class="alert alert-danger mb-2">
                    <b>@lang('Deactivated Link'): </b> {{ route('front.page.index', $link->token) }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('front.register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Username') }}</label>
                            <input id="name" type="name"
                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="phone" class="col-form-label text-md-right">{{ __('Phone number') }}</label>
                            <input id="phone" type="phone"
                                   class="form-control @error('phone') is-invalid @enderror" name="phone"
                                   value="{{ old('phone') }}" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row mt-4">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
