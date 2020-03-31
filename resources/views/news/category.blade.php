@extends('layouts.main')


@section('title', '| News by Category')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div>

        <h2>{{ $category }}</h2>
        <div>
            @include('news.newsList')
        </div>
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
