@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Auth::user()->name}} !! You are logged in! <br>
                        @if(Auth::user()->role->name=='Administrator')
                            <a href="{{ route('admin') }}"> Go to Admin Dashboard </a> <br>
                                <a href="{{ route('home.test') }}">Return Home</a>
                        @else
                                <a href="{{ route('home.test') }}">Return Home</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
