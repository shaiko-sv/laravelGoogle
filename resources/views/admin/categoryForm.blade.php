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
                        @if($category->id) {{ __('Edit Category') }} @else {{ __('Create new Category') }} @endif
                        </div>
                    <div class="card-body">
                        <form method="POST" action="@if(!$category->id){{ route('admin.categories.create') }}@else{{ route('admin.categories.update', $category) }}@endif">
                            @csrf
                            @if($category->id)
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="categoryName" class="col-md-2 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-8">
                                    <input id="categoryName" type="text" class="form-control"
                                           name="name" value="{{ $category->name ? $category->name : old('name') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoryRoute" class="col-md-2 col-form-label text-md-right">{{ __('Category Slug') }}</label>

                                <div class="col-md-8">
                                    <input id="categorySlug" type="text" class="form-control"
                                           name="slug" value="{{ $category->slug ? $category->slug : old('slug') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        @if($category->id) {{ __('Update Category') }} @else {{ __('Add Category') }} @endif
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
