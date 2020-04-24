@extends('layouts.main')

@section('title', 'Manage Categories')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Categories</b></h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Add New Category</span></a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-minus-circle"></i> <span>Delete</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                </th>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Nr. of News</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $item)
            <tr>
                <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="{{ $item->id }}">
								<label for="checkbox1"></label>
							</span>
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->newsCount }}</td>
                <td class="actions">
                    <a href="{{ route('admin.categories.edit', $item) }}">
                        <button type="button" class="btn btn-success"><i class="fas fa-pen-square"></i></button></a>
                    <form method="POST" action="{{ route('admin.categories.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <a href="{{ route('news.categories.show', $item->slug) }}">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                </td>
            </tr>
            @empty
                No categories.
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
