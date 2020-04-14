@extends('layouts.main')

@section('title', 'Manage News')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>News</b></h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Add New News</span></a>
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
                <th>Title</th>
{{--                <th>Short Text</th>--}}
{{--                <th>Full Text</th>--}}
{{--                <th>Image</th>--}}
                <th>Private</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $item)
            <tr>
                <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="{{ $item->id }}">
								<label for="checkbox1"></label>
							</span>
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
{{--                <td>{{ $item->shortText }}</td>--}}
{{--                <td>{{ $item->text }}</td>--}}
{{--                <td>{{ $item->image }}</td>--}}
                <td>{{ $item->isPrivate }}</td>
                <td>{{ $item->category_id }}</td>
                <td class="actions">
{{--                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="{{ route('admin.news.edit', $item) }}">
                        <button type="button" class="btn btn-success"><i class="fas fa-pen-square"></i></button></a>
{{--                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}">
                        @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <a href="{{ route('news.show', $item) }}">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                </td>
            </tr>
            @empty
                No news.
            @endforelse
            </tbody>
        </table>
        {{ $news->links() }}
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
