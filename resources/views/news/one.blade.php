@extends('layouts.main')


@section('title', 'News')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        @include('news.newsList')
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
