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
                    <div>
                        <h2><a class="" href="{{route('products.index')}}">Order List</a></h2>
                        <div class="page-title-subheading">

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
            <div class="position-relative row justify-content-center pt-3">
                <div class="col-sm-3">
                    <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::WAITING)}}" class="btn btn-secondary form-control">Order Waiting</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::SHIPPING)}}" class="btn btn-success form-control">Order Shipping</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::SUCCESS)}}" class="btn btn-primary form-control">Order Success</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::CANCEL)}}" class="btn btn-danger form-control">Order Cancel</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Simple table</h5>
                        <table class="mb-0 table" id="table-product">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Create_At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        {{$order->customer->name}}
                                    </td>
                                    <td>
                                        {{$order->note}}
                                    </td>
                                    <td>
                                        <span class="badge {{$order->statusBadge()}} ">
                                              {{$order->status()}}
                                        </span>
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <div class="row justify-content-around">
                                            <a href="{{route('orders.show',$order->id)}}" class="edit btn btn-primary">
                                                <i style="font-size: 20px" class="me0tismenu-icon pe-7s-edit"></i></a>
                                            <button value="{{route('orders.cancel',$order->id)}}" class="btn btn-danger deleteProduct">
                                                <i style="font-size: 20px" class="metismenu-icon pe-7s-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade bd-example-modal-lg" id="modal-description" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
                <p class="mb-0">Are you sure delete this products</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="valueDelete" type="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div
@section('js')
    <script>
        $(document).ready(function () {
            $('#table-product').DataTable();
            $('body').on('click', '.showDescription', function () {
                let html = $(this).attr('data-id')
                // let html = $('#description' + id).html();
                $('.modal-body').html(html);
                $('#modal-description').modal('show');
            })
            $('body').on('click','.deleteProduct',function (){
                let link = $(this).val();
                $('#valueDelete').attr('href',link);
                $('#modalDelete').modal('show');
            });
        })
    </script>
@endsection
