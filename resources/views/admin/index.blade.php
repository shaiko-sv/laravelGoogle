@extends('layouts.main')

@section('title', ' | Admin')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <h1>Admin</h1>

    <p>Welcome to the Admin Area.</p>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
