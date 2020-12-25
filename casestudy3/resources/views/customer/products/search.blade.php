
@extends('customer.master')
@section('title',"Auroses Rings")
@section('content')
    <div class="menu">
        <div class="banner-details" style="background-image: url('{{asset('front-end/images/backgrond-p.jpg')}}')">
            <h1 id="title-page">SEARCH</h1>
        </div>
        <div class="patern">
            <div class="container-fluid px-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="list-product">
                                <div class="row">
                                    @if($products)
                                    <div class="col-md-12">
                                        <h1 class="count-product text-center pt-5">found {{$products->count()}} products </h1>
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-6 col-lg-3 p-5">
                                                    <div class="product-grid">
                                                        <div class="product-image">
                                                            <a href="{{route('home.detailProduct',$product->id)}}">
                                                                <img class="pic-1"
                                                                     src="{{asset('/images/'.$product->images[0]->image)}}">
                                                                <img class="pic-2"
                                                                     src="{{asset('/images/'.$product->images[1]->image)}}">
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="title"><a
                                                                    href="{{route('home.detailProduct',$product->id)}}">{{$product->name}}
                                                                    | {{$product->plating->name}}</a></h3>
                                                            <div class="price">${{$product->price}}
                                                                <span>{{$product->view}} Views</span>
                                                            </div>
                                                            <a class="add-to-cart addCart" data-id="{{$product->id}}"
                                                               href="javascript:void(0)">+ Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
{{--                                            <div class="pagi">--}}
{{--                                                {{$products->links()}}--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    @else
                                        <h1 class="count-product text-center pt-5">found 0 products </h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
