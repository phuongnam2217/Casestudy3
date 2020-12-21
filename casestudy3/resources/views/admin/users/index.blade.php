@extends('admin.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>User List
                        <div class="page-title-subheading">
                            <a href="javascript:void(0)" id="createUser" class="btn btn-success btn-lg fsize-2">Add
                                User</a>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                            File Disabled
                                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Simple table</h5>
                        <table class="mb-0 table" id="table-users">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="modal-user" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center" id="modal-user-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Title"
                                           value="" maxlength="50" required>
                                    <span id="nameErr" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">UserName</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="Enter Title"
                                           value="" maxlength="50" required>
                                    <span id="usernameErr" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" id="email" name="email" required placeholder="Enter Author"
                                           class="form-control">
                                    <span id="emailErr" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" id="address" name="address" required
                                           placeholder="Enter Author"
                                           class="form-control">
                                    <span id="addressErr" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="hiddenPassWord" class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" id="password" name="password" required placeholder="Enter Author"
                                   class="form-control">
                            <span id="passwordErr" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Title"
                                   value="" maxlength="50" required>
                            <span id="phoneErr" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect" class="">Role</label>
                        <div class="col-sm-12">
                            <select name="role" id="exampleSelect" class="form-control">
                                @foreach($roles as $role)
                                    <option id="role{{$role->id}}" value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="saveUser" value="" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{--Modal Delete--}}
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure delete this user</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="valueDelete" type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var table = $('#table-users').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'address', name: 'address'},
                    {data: 'phone', name: 'phone'},
                    {data: 'status', name: 'status'},
                    {data: 'role', name: 'role'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
            $('#createUser').click(function () {
                let password = '<label class="col-sm-2 control-label">Password</label>'+
                    '<div class="col-sm-12">'+
                        '<input type="password" id="password" name="password" required placeholder="Enter Author" class="form-control">'+
                            '<span id="passwordErr" class="text-danger"></span>'+
                    '</div>';
                $("#hiddenPassWord").html(password);
                $('#user_id').val('');
                $('#modal-user-title').html('Create New User')
                $('#saveUser').html('Save User');
                $('#saveUser').val('create-user');
                $('#userForm').trigger('reset');
                $("#hiddenPassWord").show();
                $('#modal-user').modal('show');
                $("#name").removeClass('is-invalid');
                $("#username").removeClass('is-invalid');
                $("#email").removeClass('is-invalid');
                $("#password").removeClass('is-invalid');
                $("#address").removeClass('is-invalid');
                $("#phone").removeClass('is-invalid');
                $("#nameErr").html("");
                $("#usernameErr").html("");
                $("#addressErr").html("");
                $("#emailErr").html("");
                $("#phoneErr").html("");
                $("#passwordErr").html("");
            })
            $('#saveUser').click(function (e) {
                e.preventDefault();
                $(this).html('Save');
                let value = $(this).val();
                let user_id = $("#user_id").val();
                let form = $('#userForm').serialize();
                console.log(form)
                if (value === "create-user") {
                    $.ajax({
                        data: $('#userForm').serialize(),
                        url: "{{route('users.store')}}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            if(data.success){
                                toastr.success(data.success);
                                $('#modal-user').modal('hide');
                            }else{
                                console.log(data.error);
                                $("#nameErr").html(data.error.name);
                                $("#usernameErr").html(data.error.username);
                                $("#addressErr").html(data.error.address);
                                $("#emailErr").html(data.error.email);
                                $("#phoneErr").html(data.error.phone);
                                $("#passwordErr").html(data.error.password);
                                $("#name").addClass('is-invalid');
                                $("#username").addClass('is-invalid');
                                $("#email").addClass('is-invalid');
                                $("#password").addClass('is-invalid');
                                $("#address").addClass('is-invalid');
                                $("#phone").addClass('is-invalid');
                            }
                        }
                    })
                } else {
                    $.ajax({
                        data: $('#userForm').serialize(),
                        url: "{{route('users.index')}}" + "/" + user_id + "/update",
                        type: "POST",
                        dataType: 'JSON',
                        success: function (data) {
                            console.log(data.success);
                            toastr.success(data.success);
                            $('#modal-user').modal('hide');
                        }
                    })
                }

                $('#bookForm').trigger("reset");
                table.draw();
            })
            $('body').on('click', '.editUser', function () {
                var user_id = $(this).data('id');
                $("#hiddenPassWord").html("");
                $("#saveUser").val('edit-user')
                $.get("{{route('users.index')}}" + "/" + user_id + "/edit", function (data) {
                    $("#user_id").val(data.id);
                    $("#name").val(data.name);
                    $("#username").val(data.username);
                    $("#email").val(data.email);
                    $("#password").val(data.password);
                    $("#address").val(data.address);
                    $("#phone").val(data.phone)
                    console.log(data.role_id)
                    $("#role"+data.role_id).attr('selected','selected')
                    $('#modal-user-title').html('Edit User')
                    $('#modal-user').modal('show');
                })
            })
            $('body').on('click', '.deleteUser', function () {
                var user_id = $(this).data('id');
                $("#modalDelete").modal('show')
                $("#valueDelete").val(user_id);
            })
            $("#valueDelete").click(function (){
                let user_id = $("#valueDelete").val();
                $.get("{{route('users.index')}}" + "/" + user_id + "/delete", function (data) {
                    $("#modalDelete").modal('hide')
                    table.draw();
                    toastr.success(data.success);
                })
            })
            $('body').on('click', '.editStatus', function () {
                var user_id = $(this).val();
                console.log(user_id);
                $.get("{{route('users.index')}}" + "/" + user_id + "/status", function (data) {
                    table.draw();
                    toastr.success(data.success);
                })
            })
        })
    </script>
@endsection

