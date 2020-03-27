<!-- Stored in resources/views/categoryOne.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div>
        <p>{{ $category['name'] }}</p>
        <div>
            @foreach( $news as $item )
            <a href="{{ route('news.id', $item['id']) }}">{{ $item['title'] }}</a>
            <p>{{ $item['shortText'] }}</p>
            @endforeach
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection
