@extends('layouts.main')


@section('title', 'View News')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        @include('news.newsList')
    </div>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
