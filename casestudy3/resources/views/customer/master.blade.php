<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('front-end/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('front-end/css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('front-end/css/category.css')}}">
    <link rel="stylesheet" href="{{asset('assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Gabriela&display=swap" rel="stylesheet">

</head>
<body>

<div class="wrap">
    <header>
        <nav>
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <div class="d-flex justify-content-around align-items-center">
                            <div class="burger">
                                <i class="fas fa-bars"></i>
                            </div>
                            <div class="header-login">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="header-logo">
                            <a href="{{route('home.index')}}">
                                <img width="100%"
                                     src="{{asset('front-end/images/logo.png')}}"
                                     alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex justify-content-around">
                            <div class="header-search ">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="header-cart" >
                                <a href="javascript:void(0)" class="cart-link d-block">
                                    <div class="cart-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <span id="qtyCart" class="cart-count">
                                   {{session('cart') ? session('cart')->totalQty : 0}}
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="sub">
                    <li><a href="{{route('home.index')}}">Home</a></li>
                    <li><a href="{{route('necklaces.index')}}">Necklaces</a></li>
                    <li><a href="">Earrings</a></li>
                    <li><a href="">Rings</a></li>
                    <li><a href="">Bracelets & Bangles</a></li>
                    <li><a href="">About us</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="content">
        <div class="container-fuild">
            @yield('content')
        </div>
    </div>
    <div class="footer mt-5 container-fluid">
        <div class="footer-logo pt-3 d-flex justify-content-center">
            <img width="280px" src="{{asset('front-end/images/logowhite.png')}}" alt="">
        </div>
        <div class="container">
            <div class="subcribe row">
                <div class="subcribe-tittle col-sm-6 text-center">
                    Sign up now to get the latest promotions!
                </div>
                <div class="col-sm-6">
                    <div class="subcribe-input">
                        <input class="" type="text" placeholder="Enter your email">
                        <button class="effect">Subcribe</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row infomation">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="infomation-item" style="color: red">
                        <h3>Product</h3>
                        <div class="row" style="clear: both">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="">New Arrival</a></li>
                                    <li><a href="">Disney</a></li>
                                    <li><a href="">Swarovski</a></li>
                                    <li><a href="">Marvel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="infomation-item" style="color: white">
                        <h3>Information</h3>
                        <div class="row" style="clear: both">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Terms & Conditions</a></li>
                                    <li><a href="">About Aurora</a></li>
                                    <li><a href="">International Partners</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="infomation-item" style="color: blue">
                        <h3>Customer Care
                        </h3>
                        <div class="row" style="clear: both">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="">Return & Refund Policy</a></li>
                                    <li><a href="">Shipping Info</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-12">
                    <div class="infomation-item" style="color: yellow">
                        <h3>Get In Touch
                        </h3>
                        <div class="row" style="clear: both">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="">Live Chat</a></li>
                                    <li><a href="">+ 6011-10520750</a></li>
                                    <li><a href="">enquiry@auroraitalia.net</a></li>
                                    <li><a href="">Looking for international partners</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="infomation-item" style="color: orange">
                        <h3>Follow Us
                        </h3>
                        <div class="row" style="clear: both">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="">Facebook</a></li>
                                    <li><a href="">Instagram</a></li>
                                    <li><a href="">YouTube</a></li>
                                    <li><a href="">Pinterest</a></li>
                                    <li><a href="">Google+</a></li>
                                    <li><a href="">Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 0 20px">
            <hr style="color: white">
            <h4 style="color: honeydew">Aurora Italia 984544-T © 2020 All Rights Reserved.</h4>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h3" id="exampleModalFullscreenLabel">your cart
                    <span id="CartQty" style="">
                         {{session('cart') ? session('cart')->totalQty : 0}}
                    </span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('cart'))
                    @foreach(session('cart')->items as $item)
                        <div class="row py-2">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
                                <a href="" target="_blank">
                                    <img width="100px" src="{{asset('images/'.$item['product']->images[0]->image)}}" alt="" title="">
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="cart-product-name">
                                        {{$item['product']->name}}
                                    </p>
                                    <a href="javascript:void(0)" data-id="{{$item['product']->id}}" class="remove-product">
                                            <span class="">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="row" style="display:inline-block;">
                                    <div class="col-12 d-flex align-items-center mt-3">
                                        <p class="cart-product-price">{{$item['product']->price}} $</p>
                                        <div class="input-group cartedit">
                                            <div class="d-flex justify-content-center">
                                                <div class="quantity-input">
                                                    <input id="quantityBtn" type="text" value="{{$item['totalQty']}}">
                                                    <a href="javascript:void(0)" data-id="{{$item['product']->id}}" class="descrease-product" >-</a>
                                                    <a href="javascript:void(0)" data-id="{{$item['product']->id}}" class="add-product" >+</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="cart-empty">
                        Your shopping cart is empty!
                    </div>
                @endif
            </div>
            <div class="">
                <div class="total">
                    <div class="total-title">
                        Total
                    </div>
                    <div class="total-price">
                        {{session('cart') ? session('cart')->totalPrice : "0" }} $
                    </div>
                </div>
                <div class="modal-checkout d-flex justify-content-center align-items-center py-3">
                    <a href="" class="btnCheckout">CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('front-end/js/main.js')}}"></script>

<script>
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".header-cart").click(function (){
            $("#exampleModalFullscreen").modal('show');
        })
        $('body').on('click', '.addCart', function () {
            var id = $(this).attr('data-id');
            $.get("{{route('home.index')}}" + "/cart/" + id +"/add", function (data) {
                let cart = data.cart;
                $('#qtyCart').html(data.qty)
                $('#CartQty').html(data.qty)
                $('.modal-body').html(data.cart);
                $('.total-price').html(data.total+" $")
                toastr.success(data.success);
            })
        })
        $('body').on('click', '.add-product', function () {
            var id = $(this).attr('data-id');
            $.get("{{route('home.index')}}" + "/cart/" + id +"/add", function (data) {
                console.log(data.qty)
                let cart = data.cart;
                $('#qtyCart').html(data.qty)
                $('#CartQty').html(data.qty)
                $('.modal-body').html(data.cart);
                $('.total-price').html(data.total+" $")
                toastr.success(data.success);
            })
        })
        $('body').on('click','.descrease-product',function (){
            var id = $(this).attr('data-id');
            $.get("{{route('home.index')}}" + "/cart/" + id +"/decrease", function (data) {
                console.log(data.qty)
                let cart = data.cart;
                $('#qtyCart').html(data.qty)
                $('#CartQty').html(data.qty)
                $('.modal-body').html(data.cart);
                $('.total-price').html(data.total+" $")
                toastr.success(data.success);
            })
        })
        $('body').on('click','.remove-product',function (){
            var id = $(this).attr('data-id');
            console.log(id)
            $.get("{{route('home.index')}}" + "/cart/" + id +"/remove", function (data) {
                console.log(data.qty)
                let cart = data.cart;
                console.log(data.success)
                toastr.success(data.success);
                $('#qtyCart').html(data.qty)
                $('#CartQty').html(data.qty)
                $('.modal-body').html(data.cart);
                $('.total-price').html(data.total+" $")

            })
        })
    })
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
{{--@if(\Illuminate\Support\Facades\Session::has('success'))--}}
{{--    <script>--}}
{{--        toastr.success("{!! Session::get('success') !!}")--}}
{{--    </script>--}}
{{--@endif--}}
@yield('js')

</body>
</html>
