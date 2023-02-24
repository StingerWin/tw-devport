@extends('front.layouts.app')

@section('title', __('Page'))

@php
    /** @var \App\Models\HashLink $hashLink */
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <a href="?history" class="btn btn-primary">
                        {{ __('History') }}
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <form method="POST" action="{{ route('front.page.store', $hashLink->token) }}" class="mx-2">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                {{ __('Generate Link') }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('front.page.deactivate', $hashLink->token) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                {{ __('Deactivate Link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    @if($url = session('url'))
                        <div class="alert alert-success my-2">
                            <b>@lang('Link'): </b>
                            <a href="{{ $url }}">{{ $url }}</a>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('front.page.experienceLuck', $hashLink->token) }}">
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Imfeelinglucky') }}
                            </button>
                        </div>
                    </form>
                    @php
                        /** @var \App\Models\Winning $winning */
                    @endphp
                    @if($winning = session('winning'))
                        <div class="alert {{ $winning->is_win ? 'alert-success' : 'alert-danger' }} my-2">
                            <b>{{ $winning->text_win }}</b>
                        </div>
                    @endif
                    @php
                        /** @var \App\Models\Winning[] $winnings  */
                    @endphp
                    @if(request()->has('history') or $winnings->isNotEmpty())
                        <div class="mt-3">
                            <h3>@lang('History')</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Winning</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($winnings as $winning)
                                        <tr>
                                            <td>{{ $winning->text_win }}</td>
                                            <td>{{ $winning->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
