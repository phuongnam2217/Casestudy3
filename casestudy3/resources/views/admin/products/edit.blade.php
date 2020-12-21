@extends('admin.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>
                        <h3><a href="{{route('products.index')}}">Products</a></h3>
                        <h4 class="">Edit Products
                        </h4>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">
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
                                    <a disabled="" href="javascript:void(0);" class="nav-link disabled">
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
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="{{route('products.update',$product->id)}}" class="" method="post">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <textarea name="name" id="name" placeholder="Name Product" type="text" class="form-control">{{$product->name}}</textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePassword" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" placeholder="Description" type="text" class="form-control">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleSelect" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category" id="exampleSelect" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->name == $product->category->name ? "selected":"" }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleSelect" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="material" id="exampleSelect" class="form-control">
                                        @foreach($materials as $material)
                                            <option value="{{$material->id}}" {{$material->name == $product->material->name ? "selected":"" }}>{{$material->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleSelect" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="plating" id="exampleSelect" class="form-control">
                                        @foreach($platings as $plating)
                                            <option value="{{$plating->id}}" {{$plating->name == $product->plating->name ? "selected":"" }}>{{$plating->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePassword" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input name="price" id="price" value="{{$product->price}}" placeholder="Price" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePassword" class="col-sm-2 col-form-label">Quantity Stock</label>
                                <div class="col-sm-10">
                                    <input name="stock" id="stock" value="{{$product->stock}}" placeholder="Quantity Stock" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="position-relative row justify-content-center">
                                <div class="col-sm-4">
                                    <a href="{{route('products.index')}}" class="btn btn-secondary form-control">Back</a>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success form-control">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('description')
    </script>
@endsection
