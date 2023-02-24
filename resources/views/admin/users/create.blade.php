@extends('admin.layouts.app')

@section('title', __('Create User'))

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3>@lang('Create User')</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-3">
                @if($errors->any())
                    @include('admin.components.validation_errors')
                @endif
                {!! Form::open([
                                            'method' => 'STORE',
                                            'url' => route('admin.users.store'),
                                            ]) !!}
                @include('admin.users.form', [
                    'edit' => false,
                    'submitButtonText' => 'Add',
                    'back' =>  route('admin.users.index'),
                ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
