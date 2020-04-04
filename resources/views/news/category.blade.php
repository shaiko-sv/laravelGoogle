@extends('layouts.main')


@section('title', '| News by Category')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>{{ $category }}</h2>
        </div>
        @include('news.newsList')
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
