@extends('layouts.main')

@section('title', 'Admin')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Admin</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <p>Welcome to the Admin Area.</p>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
