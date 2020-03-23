<!-- Stored in resources/views/news.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <h1>News</h1>

    @php
        echo "<hr>";
    @endphp

@endsection

@section('footer')
    @include('footer')
@endsection
