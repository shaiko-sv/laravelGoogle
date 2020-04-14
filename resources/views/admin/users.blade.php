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
                    <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-plus-circle"></i> <span>Add New User</span></a>
                    <a href="#deleteUserModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-minus-circle"></i> <span>Delete</span></a>
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
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>Thomas Hardy</td>
                <td>thomashardy@mail.com</td>
                <td>89 Chiaroscuro Rd, Portland, USA</td>
                <td>(171) 555-2222</td>
                <td>
{{--                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
{{--                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox2" name="options[]" value="1">
                        <label for="checkbox2"></label>
                    </span>
                </td>
                <td>Dominique Perrier</td>
                <td>dominiqueperrier@mail.com</td>
                <td>Obere Str. 57, Berlin, Germany</td>
                <td>(313) 555-5735</td>
                <td>
                    {{--                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
                    {{--                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox3" name="options[]" value="1">
                        <label for="checkbox3"></label>
                    </span>
                </td>
                <td>Maria Anders</td>
                <td>mariaanders@mail.com</td>
                <td>25, rue Lauriston, Paris, France</td>
                <td>(503) 555-9931</td>
                <td>
                    {{--                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
                    {{--                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox4" name="options[]" value="1">
                        <label for="checkbox4"></label>
                    </span>
                </td>
                <td>Fran Wilson</td>
                <td>franwilson@mail.com</td>
                <td>C/ Araquil, 67, Madrid, Spain</td>
                <td>(204) 619-5731</td>
                <td>
                    {{--                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
                    {{--                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox5" name="options[]" value="1">
                        <label for="checkbox5"></label>
                    </span>
                </td>
                <td>Martin Blank</td>
                <td>martinblank@mail.com</td>
                <td>Via Monte Bianco 34, Turin, Italy</td>
                <td>(480) 631-2097</td>
                <td>
                    {{--                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>--}}
                    <a href="#editUserModal" class="edit" data-toggle="modal"><i class="fas fa-pen-square"></i></a>
                    {{--                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a>--}}
                    <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
