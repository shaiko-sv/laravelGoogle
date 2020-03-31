@extends('layouts.main')


@section('title', ' | Main')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <h1>Welcome</h1>

    <p>Welcome to the News Portal.</p>

@endsection


@section('footer')
    @include('footer')
@endsection
