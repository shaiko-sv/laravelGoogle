@extends('layouts.main')

@section('title', ' | All News')


@section('menu')
    @include('menu')
@endsection


@section('content')
    @include('news.newsList')
@endsection


@section('footer')
    @include('footer')
@endsection
