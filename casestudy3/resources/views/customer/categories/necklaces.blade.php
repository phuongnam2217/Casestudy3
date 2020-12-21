@extends('customer.master')
@section('title',"Auroses Necklaces")
@section('content')
    <div class="menu">
        <div class="banner-details">
            <h1 id="title-page">NECKLACES</h1>
        </div>
        <div class="patern">
            <div class="container-fluid px-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-title">Sort By</div>
                            <ul class="list-group">
                                <li class="list-group-item {{$sorts == "default" && $orders == "default" ? "active": "" }}"><a href="{{route('necklaces.index')}}">DEFAULT</a></li>
                                <li class="list-group-item {{$sorts == "name" && $orders == "asc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['name','asc',$value])}}">Name ( A - Z )</a></li>
                                <li class="list-group-item {{$sorts == "name" && $orders == "desc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['name','desc',$value])}}">Name ( Z - A )</a></li>
                                <li class="list-group-item {{$sorts == "price" && $orders == "asc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['price','asc',$value])}}">PRICE ( LOW > HIGH )</a></li>
                                <li class="list-group-item {{$sorts == "price" && $orders == "desc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['price','desc',$value])}}">PRICE ( HIGH > LOW )</a></li>
                                <li class="list-group-item {{$sorts == "view" && $orders == "asc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['view','asc',$value])}}">RATING ( LOWEST )</a></li>
                                <li class="list-group-item {{$sorts == "view" && $orders == "desc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['view','desc',$value])}}">RATING ( HIGHEST )</a></li>
                                <li class="list-group-item {{$sorts == "sold" && $orders == "asc" ? "active": "" }}"><a href="{{route('necklaces.sortPagination',['sold','desc',$value])}}">BEST SELLER</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="filter-product clearfix">
                                    <div class="list-options">
                                        <div class="sort">
                                            SHOW
                                            <select name="category" id=""  onchange="location = this.value">
                                                <option value="" hidden>6</option>
                                                <option value="{{route('necklaces.sortPagination',[$sorts,$orders,3])}}" {{$value == 3 ? "selected": "" }}>3</option>
                                                <option value="{{route('necklaces.sortPagination',[$sorts,$orders,6])}}" {{$value == 6 && $orders == "asc" ? "selected": "" }}>6</option>
                                                <option value="{{route('necklaces.sortPagination',[$sorts,$orders,9])}}" {{$value == 9 && $orders == "desc" ? "selected": "" }}>9</option>
                                                <option value="{{route('necklaces.sortPagination',[$sorts,$orders,30])}}" {{$value == 30 && $orders == "asc" ? "selected": "" }}>30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="list-product">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-6 col-lg-4 p-5">
                                                    <div class="product-grid">
                                                        <div class="product-image">
                                                            <a href="{{route('home.detailProduct',$product->id)}}">
                                                                <img class="pic-1" src="{{asset('/images/'.$product->images[0]->image)}}">
                                                                <img class="pic-2" src="{{asset('/images/'.$product->images[1]->image)}}">
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="title"><a href="{{route('home.detailProduct',$product->id)}}">{{$product->name}} | {{$product->plating->name}}</a></h3>
                                                            <div class="price">${{$product->price}}
                                                                <span>{{$product->view}} Views</span>
                                                            </div>
                                                              <a class="add-to-cart addCart" data-id="{{$product->id}}" href="javascript:void(0)">+ Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="pagi">
                                                {{$products->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
