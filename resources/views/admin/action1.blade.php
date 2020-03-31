@extends('layouts.main')


@section('title', '| Action 1')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <h1>Action 1</h1>

    <p>This Action 1 page.</p>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
