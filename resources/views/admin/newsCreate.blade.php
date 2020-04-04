@extends('layouts.main')

@section('title', 'Create News')

@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create new News') }}
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
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.newsCrud.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="newsTitle" class="col-md-2 col-form-label text-md-right">{{ __('News Title') }}</label>

                                <div class="col-md-8">
                                    <input id="newsTitle" type="text" class="form-control"
                                           name="title" value="{{ old('title') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsShort" class="col-md-2 col-form-label text-md-right">{{ __('News Short Text') }}</label>

                                <div class="col-md-8">
                                    <input id="newsShort" type="text" class="form-control"
                                           name="shortText" value="{{ old('shortText') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsText" class="col-md-2 col-form-label text-md-right">{{ __('News Text') }}</label>

                                <div class="col-md-8">
                                    <textarea id="newsText" type="text" class="form-control" rows="5"
                                             name="text" required>{{ old('text') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsImage" class="col-md-2 col-form-label text-md-right">{{ __('News Image') }}</label>

                                <div class="col-md-8">
                                    <input type="file" name="image" id="newsImage">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsCategory" class="col-md-2 col-form-label text-md-right">{{ __('News Category') }}</label>

                                <div class="col-md-3">
                                    <select id="newsCategory" class="form-control"
                                            name="category_id" required>
                                    @forelse($categories as $item)
                                            <option value="{{ $item['id'] }}"
                                                    @if ($item['id'] == old('category_id')) selected @endif>{{ $item['name'] }}</option>
                                    @empty
                                            <option value="null">No categories</option>
                                    @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-check offset-md-2">
                                <input id="isPrivate" type="checkbox" class="form-check-input offset-md-2"
                                       @if (old('isPrivate') == 1) checked @endif
                                       name="isPrivate" value="1">
                                <label class="form-check-label" for="isPrivate">{{ __('Private News?') }}</label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add News') }}
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
