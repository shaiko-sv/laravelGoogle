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
                        @if($news->id) {{ __('Edit News') }} @else {{ __('Create new News') }} @endif
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="@if(!$news){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf
{{--                            Check if need update route--}}
                            @if(!empty($news->id))
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="newsTitle" class="col-md-2 col-form-label text-md-right">{{ __('News Title') }}</label>
                                <div class="col-md-8">
                                    <input id="newsTitle" type="text" class="form-control"
                                           name="title" value="{{ old('title') ?? $news->title }}" autofocus>
                                    @if($errors->has('title'))
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                            @foreach($errors->get('title') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('News Short Text') }}</label>

                                <div class="col-md-8">
                                    <input id="description" type="text" class="form-control"
                                           name="description" value="{{ old('description') ?? $news->description }}">
                                    @if($errors->has('description'))
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                            @foreach($errors->get('description') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsText" class="col-md-2 col-form-label text-md-right">{{ __('News Text') }}</label>

                                <div class="col-md-8">
                                    <textarea id="my-editor" type="text" class="form-control" rows="5"
                                             name="text">{!!  empty(old()) ? $news->text : old('text')!!}</textarea>
                                    @if($errors->has('text'))
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                            @foreach($errors->get('text') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newsImage" class="col-md-2 col-form-label text-md-right">{{ __('News Image') }}</label>

                                <div class="col-md-8">
                                    <input type="file" name="image" id="newsImage" value="">
                                </div>
                                @if($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                        @foreach($errors->get('image') as $error)
                                            <li>{{ $error }}</li><br>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="newsCategory" class="col-md-2 col-form-label text-md-right">{{ __('News Category') }}</label>

                                <div class="col-md-3">
                                    <select id="newsCategory" class="form-control"
                                            name="category_id">
                                    @forelse($categories as $item)
                                            <option
                                                @if($item->id == old('category_id') ?? $item->id == $news->category_id)
                                                selected
                                                @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                            <option value="null">No categories</option>
                                    @endforelse
                                    </select>
                                    @if($errors->has('category_id'))
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                            @foreach($errors->get('category_id') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-check offset-md-2">
                                <input id="isPrivate" type="checkbox" class="form-check-input offset-md-2"
                                       @if (old('isPrivate') == 1 || $news->isPrivate == 1) checked @endif
                                       name="isPrivate" value="1">
                                <label class="form-check-label" for="isPrivate">{{ __('Private News?') }}</label>
                                @if($errors->has('isPrivate'))
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                        @foreach($errors->get('isPrivate') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">@if($news->id){{__('Update News')}}@else{{__('Add News')}}@endif</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
