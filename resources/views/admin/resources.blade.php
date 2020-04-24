@extends('layouts.main')

@section('title', 'Manage Resources')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Resources</b></h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{ route('admin.resources.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Add New Resource</span></a>
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
                <th>Link</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $item)
            <tr>
                <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="{{ $item->id }}">
								<label for="checkbox1"></label>
							</span>
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->link }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="actions">
                    <a href="{{ route('admin.resources.edit', $item) }}">
                        <button type="button" class="btn btn-success"><i class="fas fa-pen-square"></i></button></a>
                    <form method="POST" action="{{ route('admin.resources.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <a href="{{ route('admin.resources.show', $item) }}">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                </td>
            </tr>
            @empty
                No resources.
            @endforelse
            </tbody>
        </table>
        {{ $resources->links() }}
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
