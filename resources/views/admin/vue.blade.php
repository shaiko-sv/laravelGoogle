@extends('layouts.main')


@section('title', 'Vue')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div id="app">
        <example-component>

        </example-component>
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
