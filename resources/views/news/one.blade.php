@extends('layouts.main')


@section('title', ' | News')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div>
        <h2>{{ $news['title'] }}</h2>
        @if(!$news['isPrivate'])
            <p>{!! $news['text'] !!}</p>
        @else
            <p>{{ $news['shortText'] }}</p>
            <a href="/login">Register or Login to read...</a>
        @endif
    </div>

@endsection


@section('footer')
    @include('footer')
@endsection
