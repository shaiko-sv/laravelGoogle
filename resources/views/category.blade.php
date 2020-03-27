<!-- Stored in resources/views/category.blade.php -->

@extends('layouts.app')

@section('title', 'Geekbrains')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row">
        <div class="col-3"><?php /** @var \App\Category $category */
            foreach ($category as $key => $item): ?>
            <a href="<?=route('category.name', $key, false)?>"><?=$item['name']?></a>
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
