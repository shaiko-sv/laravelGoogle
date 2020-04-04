<!-- Stored in resources/views/main.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <h1>Welcome</h1>

    <p>Welcome to the News Portal.</p>

    @php
        echo "<hr>";
    @endphp

@endsection

@section('footer')
    @include('footer')
@endsection
