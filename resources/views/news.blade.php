<!-- Stored in resources/views/news.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <hr>
    <div>
         @foreach( $news as $item )
             <a href="<?=route('news.id', $item['id'])?>">{{ $item['title'] }}</a>
             <p>{{  $item['shortText'] }}</p>
            <hr>
         @endforeach

    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
