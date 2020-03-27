<!-- Stored in resources/views/admin/main.blade.php -->

@extends('layouts.admin')

@section('title', 'Geekbrains')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <h1>Admin</h1>

    <p>Welcome to the Admin Area.</p>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
