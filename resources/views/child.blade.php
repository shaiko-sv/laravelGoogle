<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h1>Laravel</h1>

    Hello, @{{ name }}.
    <p>This is my body content.</p>

    @php
        phpinfo();
    @endphp

    @component('alert')
        @slot('title')
            Forbidden
        @endslot

        You are not allowed to access this resource!<br>
        The current UNIX timestamp is {{ time() }}.
    @endcomponent

@endsection
