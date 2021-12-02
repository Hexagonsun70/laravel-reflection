@extends('layouts.app')

@section('content')
<div class="container flex justify-center ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-green-500 bg-gray-200 px-8 py-6 text-center rounded-xl">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ __('You are logged in!') }}
                    @else
                        {{ __('Please log in!') }}
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
