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
                    <div><h2><a class="" href="{{route('products.index')}}">Products List</a></h2>
                        <h3>Upload Image</h3>
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
                    <div class="card">
                        <div class="card-header">
                            Upload File Image Product
                        </div>
                        <div class="card-body">
                            <form action="{{route('products.upload',$product->id)}}" method="post"
                                  enctype="multipart/form-data" class="dropzone" id="uploadImage">
                                @csrf
                                <div class="">
                                    <h3 class="text-center">
                                        Upload Images By Click On Box
                                    </h3>
                                </div>
                                <div class="dz-default dz-message">
                                    <span>Drop file here to upload </span>
                                </div>
                            </form>
                        </div>
                        <div id="updateImg" class="btn btn-lg btn-primary">Update</div>
                    </div>
                </div>
                <div class="row" id="showImage">
                    @foreach($product->images as $image)
                        <div class="col-3">
                            <div class="card-body">
                                <img width="100%" src="{{asset('images/'.$image->image)}}" alt="">
                            </div>
                            <a href="javascript:void(0)" data-id="{{$product->id}}" data-target="{{$image->id}}" class="text-center d-block remove-image">Remove</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('#updateImg').click(function () {
                location.reload();
            })
            $('body').on('click','.remove-image',function (){
                let product_id = $(this).attr('data-id');
                let image_id = $(this).attr('data-target');
                // console.log(product_id);
                // console.log(image_id);
                $.get("{{route('products.index')}}"+"/"+product_id+"/"+image_id+"/remove",function (data){
                    $('#showImage').html(data);
                })
            })
        });
    </script>
@endsection
