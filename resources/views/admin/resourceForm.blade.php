@extends('layouts.main')

@section('title', 'Create Resource')

@section('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if($resource->id) {{ __('Edit Resource') }} @else {{ __('Create new Resource') }} @endif
                        </div>
                    <div class="card-body">
                        <form method="POST" action="@if(!$resource->id){{ route('admin.resources.store') }}@else{{ route('admin.resources.update', $resource) }}@endif">
                            @csrf
                            @if($resource->id)
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="resourceLink" class="col-md-2 col-form-label text-md-right">{{ __('Resource Link') }}</label>

                                <div class="col-md-8">
                                    <input id="resourceLink" type="text" class="form-control"
                                           name="link" value="{{ $resource->link ?? old('link') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        @if($resource->id) {{ __('Update Resource') }} @else {{ __('Add Resource') }} @endif
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
