@extends('layouts.main')

@section('title', 'Manage Users')


@section('menu')
    @include('admin.menu')
@endsection


@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Users</b></h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success" data-toggle="modal"><i class="fas fa-plus-circle"></i> <span>{{ __('Add New User') }}</span></a>
                    <a href="#" class="btn btn-danger disabled" data-toggle="modal"><i class="fas fa-minus-circle"></i> <span>Delete</span></a>
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
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Is Admin</th>
                <th>Do/Undo Admin</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="{{ $user }}">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->is_admin ? 'True' : 'False' }}</td>
                <td>
                    @if(!$user->is_admin)
                        <a href="{{ route('admin.userAdmin', $user) }}"><button type="button" class="btn btn-success"><i class="fas fa-user-cog"></i></button></a>
                    @else
                        <a href="@if(Auth::user() == $user && Auth::user()->is_admin){{ '#' }}@else{{ route('admin.userAdmin', $user) }}@endif">
                        <button type="button" class="btn btn-success" @if(Auth::user() == $user && Auth::user()->is_admin){{ 'disabled' }}@endif>
                            <i class="fas fa-user"></i>
                        </button>
                    </a>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('admin.users.edit', $user) }}"><button type="button" class="btn btn-success"><i class="fas fa-pen-square"></i></button></a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <a href="{{ route('admin.users.show', $user) }}">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                </td>
            </tr>
            @empty
                No users.
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
