<!-- Stored in resources/views/newsOne.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div>
        <h2><?=$news['title']?></h2>
        <p><?=$news['text']?></p>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection
