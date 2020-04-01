@extends('layouts.main')


@section('title', 'Main')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Welcome to the News Portal.</p>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
