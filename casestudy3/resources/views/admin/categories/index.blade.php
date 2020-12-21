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
                    <div>Categories List
                        <div class="page-title-subheading">
                            <a href="javascript:void(0)" id="createCategory" class="btn btn-success btn-lg fsize-2">Create
                                New Category</a>
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
<div class="modal fade bd-example-modal-lg" id="modal-category" tabindex="-1" role="dialog"
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
                <form id="categoryForm" name="categoryForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="username">Name Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter Category"
                                   value="" maxlength="50" required>
                            <span id="nameErr" class="text-danger"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="saveCategory" value="" class="btn btn-primary">Save changes</button>
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
                <p class="mb-0">Are you sure delete this category</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="valueDelete" type="button" class="btn btn-danger">Delete</button>
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
                ajax: "{{ route('categories.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
            $('#createCategory').click(function () {
                $('#user_id').val('');
                $('#modal-user-title').html('Create New Category')
                $('#saveCategory').html('Save Category');
                $('#saveCategory').val('create-category');
                $("#nameErr").html("");
                $("#name").removeClass('is-invalid');
                $('#categoryForm').trigger('reset');
                $('#modal-category').modal('show');
            })
            $('#saveCategory').click(function (e) {
                e.preventDefault();
                $(this).html('Save');
                let value = $(this).val();
                let user_id = $("#user_id").val();
                let form = $('#categoryForm').serialize();
                console.log(form)
                if (value === "create-category") {
                    $.ajax({
                        data: $('#categoryForm').serialize(),
                        url: "{{route('categories.store')}}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            if (data.success) {
                                toastr.success(data.success);
                                $('#modal-category').modal('hide');
                            } else {
                                console.log(data.error);
                                $("#nameErr").html(data.error.name);
                                $("#name").addClass('is-invalid');
                            }
                        }
                    })
                } else {
                    $.ajax({
                        data: $('#categoryForm').serialize(),
                        url: "{{route('categories.index')}}" + "/" + user_id + "/update",
                        type: "POST",
                        dataType: 'JSON',
                        success: function (data) {
                            console.log(data.success);
                            toastr.success(data.success);
                            $('#modal-category').modal('hide');
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
                $.get("{{route('categories.index')}}" + "/" + user_id + "/edit", function (data) {
                    $("#user_id").val(data.id);
                    $("#name").val(data.name);
                    $('#modal-user-title').html('Edit Category')
                    $('#modal-category').modal('show');
                })
            })
            $('body').on('click', '.deleteUser', function () {
                var user_id = $(this).data('id');
                $("#modalDelete").modal('show')
                $("#valueDelete").val(user_id);
            })
            $("#valueDelete").click(function () {
                let user_id = $("#valueDelete").val();
                $.get("{{route('categories.index')}}" + "/" + user_id + "/delete", function (data) {
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
        // CKEDITOR.replace('');
    </script>
@endsection

