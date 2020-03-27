<!-- Stored in resources/views/news.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div>
        <p><?=$category['name']?></p>
        <div>
            <?php foreach ($news as $item): ?>
            <a href="<?=route('news.id', $item['id'])?>"><?=$item['title']?></a>
            <p><?=$item['text']?></p>
            <?php endforeach; ?>
        </div>
    </div>
    @php
        echo "<hr>";
    @endphp

@endsection

@section('footer')
    @include('footer')
@endsection
