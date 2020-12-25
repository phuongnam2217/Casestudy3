@extends('customer.master')
@section('title',$product->name)
@section('content')
    <div class="menu">
        <div class="banner-details" style="background-image: url('{{asset('front-end/images/backgrond-p.jpg')}}')">
            <h1 id="title-page">{{$product->name}} | 925 {{$product->material->name}} |
                18K {{$product->plating->name}}</h1>
        </div>
        <div class="patern">
            <div class="product-details">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <img id="page-img" width="100%"
                                         src="{{asset('images/'.$product->images[0]->image)}}"
                                         alt="">
                                </div>
                                <div class="row">
                                    <div class="owl-carousel">
                                        @foreach($product->images as $images)
                                            <img class="change-img" src="{{asset('images/'.$images->image)}}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <br><br><br><br><br><br><br><br><br><br>
                            <h2 class="details-product-name">{{$product->name}} | 925 {{$product->material->name}} |
                                18K {{$product->plating->name}}</h2>
                            <br><br>
                            <div class="review">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <br><br><br>
                                    <p class="rating-links">
                                        {{$product->view}} View | Write a review
                                    </p>
                                </div>
                            </div>
                            <br><br>
                            <h2 class="details-product-price">Price: {{$product->price}}$</h2>
                            <br><br><br>
                            <hr>
                            <br>
                            <div class="product-status">
                                <span>Product Code:</span> PGASRP{{$product->id}}<br>
                                <span>Availability :</span>
                                <strong
                                    style="color: #99cc00;">{{$product->status == 1 ? "In Stock" : "Out of stock"}}</strong>
                            </div>
                            <br>
                            <hr>
                            <div class="add-cart">
                                <form id="form-add" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="quantity">
                                                <input id="quantityBtn" name="quantityBtn" type="text" value="1">
                                                <a href="javascript:void(0)" id="up">+</a>
                                                <a href="javascript:void(0)" id="down">-</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="quantity">
                                                <button type="submit" class="addtoCard" value="{{$product->id}}">ADD TO CART</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="description">
                                <div class="card">
                                    <div class="card-header">
                                        Description
                                    </div>
                                    <div class="cart-body">
                                        {!! $product->description !!}
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
@section('js')
    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $('.addtoCard').click(function (e){
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    data : $("#form-add").serialize(),
                    url: "{{route('home.index')}}" + "/cart/" + id +"/add",
                    type: "POST",
                    dataType: 'json',
                    success : function (data){
                        $('#qtyCart').html(data.qty)
                        toastr.success(data.success);
                        $('.modal-content').html(data.cart);
                    }
                })
            })
        })


        $(".owl-carousel").owlCarousel({
            loop: true,
            // margin: 10,
            dots: false,
            // pagination:true,
            // navigationText:true,
            autoplay: true,
            animateOut: 'fadeOut',
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                    slideBy: 2
                },
                600: {
                    items: 3,
                    nav: true,
                },
                1000: {
                    items: 4,
                    nav: true,
                }
            }
        });
    </script>
@endsection
