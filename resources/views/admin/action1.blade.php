<!-- Stored in resources/views/admin/main.blade.php -->

@extends('layouts.admin')

@section('title', 'Geekbrains')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <h1>Action 1</h1>

    <p>This Action 1 page.</p>

    @php
        echo "<hr>";
    @endphp

@endsection

@section('footer')
    @include('admin.footer')
@endsection
