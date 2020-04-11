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
                <td>
{{--                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editNewsModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
{{--                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteNewsModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @empty
                No news.
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
{{--        <div class="clearfix">--}}
{{--            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>--}}
{{--            <ul class="pagination">--}}
{{--                <li class="page-item disabled"><a href="#">Previous</a></li>--}}
{{--                <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                <li class="page-item active"><a href="#" class="page-link">3</a></li>--}}
{{--                <li class="page-item"><a href="#" class="page-link">4</a></li>--}}
{{--                <li class="page-item"><a href="#" class="page-link">5</a></li>--}}
{{--                <li class="page-item"><a href="#" class="page-link">Next</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
