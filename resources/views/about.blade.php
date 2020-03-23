<!-- Stored in resources/views/about.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <h1>About</h1>

    @php
        echo "<hr>";
    @endphp

@endsection

@section('footer')
    @include('footer')
@endsection
