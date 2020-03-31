@extends('layouts.main')


@section('title', '| Categories')


@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse( $category as $item )
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header"><a href="{{ route('news.category.show', $item['route']) }}">{{ $item['name'] }}</a></div>
                    </div>
                </div>
            @empty
                <h2>No categories.</h2>
            @endforelse
        </div>
    </div>
@endsection


@section('footer')
    @include('footer')
@endsection
