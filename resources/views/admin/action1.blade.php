<!-- Stored in resources/views/admin/action1.blade.php -->

@extends('layouts.admin')

@section('title', 'Geekbrains')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <h1>Action 1</h1>

    <p>This Action 1 page.</p>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
