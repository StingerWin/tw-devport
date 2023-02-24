@extends('admin.layouts.app')

@section('title', __('Edit User'))

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3>@lang('Edit User')</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-3">
                @if($errors->any())
                    @include('admin.components.validation_errors')
                @endif
                {!! Form::model($modelValues, [
                                            'method' => 'PATCH',
                                            'url' => route('admin.users.update', $user),
                                            ]) !!}
                @include('admin.users.form', [
                    'edit' => false,
                    'submitButtonText' => 'Update',
                    'back' =>  route('admin.users.index'),
                ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
