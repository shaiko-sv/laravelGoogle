@extends('layouts.main')


@section('title', ' | Action 2')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <h1>Action 2</h1>

    <p>This is Action 2 page.</p>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
