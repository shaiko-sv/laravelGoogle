@extends('layouts.main')


@section('title', 'About')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>About</h1>
            </div>
        </div>
    </div>

@endsection


@section('footer')
    @include('footer')
@endsection
