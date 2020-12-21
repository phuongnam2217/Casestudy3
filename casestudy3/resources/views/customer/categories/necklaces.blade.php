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

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="filter-product clearfix">
                                    <div class="list-options">
                                        <div class="sort">
                                            Sort By:
                                            <select name="category" id="" onchange="location = this.value">
                                                <option value="" hidden>DEFAULT</option>
                                                <option value="{{route('necklaces.index')}}">DEFAULT</option>
                                                <option value="{{route('necklaces.sort',['name','asc'])}}" {{$sorts == "name" && $orders == "asc" ? "selected": "" }}>NAME (A - Z)</option>
                                                <option value="{{route('necklaces.sort',['name','desc'])}}" {{$sorts == "name" && $orders == "desc" ? "selected": "" }}>NAME (Z - A)</option>
                                                <option value="{{route('necklaces.sort',['price','asc'])}}" {{$sorts == "price" && $orders == "asc" ? "selected": "" }}>PRICE (LOW > HIGH)</option>
                                                <option value="{{route('necklaces.sort',['price','desc'])}}" {{$sorts == "price" && $orders == "desc" ? "selected": "" }}>PRICE (HIGH > LOW)</option>
                                                <option value="{{route('necklaces.sort',['view','asc'])}}" {{$sorts == "view" && $orders == "asc" ? "selected": "" }}>RATING (LOWEST)</option>
                                                <option value="{{route('necklaces.sort',['view','desc'])}}" {{$sorts == "view" && $orders == "desc" ? "selected": "" }}>RATING (HIGHEST)</option>
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
                                                <div class="col-6 col-lg-3">
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
