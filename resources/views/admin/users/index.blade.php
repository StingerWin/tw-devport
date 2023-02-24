@extends('admin.layouts.app')

@section('title', __('Users'))

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>@lang('Users')</h3>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                            {{ __('Create') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-3">
                @php
                    /** @var \App\Models\User[] $users  */
                @endphp
                @if($users->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Commands</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @component('admin.components.table_commands', [
                                            'entity' => $user,
                                            'deleteRoute' => 'admin.users.destroy'
                                        ])
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               class="btn btn-icon text-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        @endcomponent
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
