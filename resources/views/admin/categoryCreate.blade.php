@extends('layouts.main')

@section('title', 'Create Category')

@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create new Category') }}
                        @if (session('error'))
                            @component('alert')
                                @slot('title')
                                    Error
                                @endslot
                                {{ session('error') }}
                            @endcomponent
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.categoriesCrud.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="categoryName" class="col-md-2 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-8">
                                    <input id="categoryName" type="text" class="form-control"
                                           name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoryRoute" class="col-md-2 col-form-label text-md-right">{{ __('Category Slug') }}</label>

                                <div class="col-md-8">
                                    <input id="categorySlug" type="text" class="form-control"
                                           name="slug" value="{{ old('slug') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Category') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('admin.footer')
@endsection
