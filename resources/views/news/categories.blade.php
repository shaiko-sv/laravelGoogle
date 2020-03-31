@extends('layouts.main')


@section('title', '| Categories')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="row">
        @forelse( $category as $item )
            <div class="col-md-6 col-lg-3">
                <hr>
                <h2><a href="{{ route('news.category.show', $item['route']) }}">{{ $item['name'] }}</a></h2>
                <hr>
            </div>
        @empty
            <h2>No categories.</h2>
        @endforelse
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
