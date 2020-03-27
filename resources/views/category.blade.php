<!-- Stored in resources/views/category.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row">
        @foreach( $category as $item )
            <div class="col-3">
                <hr>
                <a href="{{ route('news.category.name', $item['route']) }}">{{ $item['name'] }}</a>
                <hr>
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
