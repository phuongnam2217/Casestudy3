@extends('customer.master')
@section('title','Aurora Italia - Luxury Jewelry')
@section('content')
    <div class="menu">
        {{--            New Products             --}}
        <div class="sidebar">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="https://www.auroraitalia.net/image/catalog/homepage/Web-Dazzling-collection%20latest-min.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.auroraitalia.net/image/catalog/homepage/Web1-banner-Auroses-Julyx-min.jpg"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.auroraitalia.net/image/catalog/homepage/newbannerv4-min.jpg"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.auroraitalia.net/image/catalog/homepage/Web-banner-Bawal-Ring.jpg"
                             class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        <div class="layout">
            <div class="title">
                Discover New Designs
            </div>
            <div class="sub-tittle">
                The refined workmanship that inspired the pivotal elements to complete
                <br>
                the presence of every woman with unsurpassed elegance, with dazzling Swarovski Zirconia.
            </div>
        </div>
        <div class="layout">
            <div class="owl-carousel owl-theme">
                @foreach($products as $product)
                    <div class="cart">
                        <div class="cart-body">
                            <a href="{{route('home.detailProduct',$product->id)}}">
                                @foreach($product->images as $key => $image)
                                    <img src="{{asset('images/'.$image->image)}}" alt="">
                                    @break(0)
                                @endforeach
                            </a>
                        </div>
                        <b><a href="{{route('home.detailProduct',$product->id)}}"
                              class="animation" tabindex="-1">Shop Now &gt;</a></b>
                    </div>
                @endforeach
            </div>
        </div>
        {{--                Category             --}}
        <div class="layout">
            <div class="title">
                Discover By Category
            </div>
            <div class="sub-tittle">
                Browse into the exceptional designs and exquisite craftsmanship
            </div>
        </div>
        <div class="layout">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="cart">
                        <div class="cart-body">
                            <a href="{{route('necklaces.index')}}">
                                @foreach($necklace->images as $key => $image)
                                    <img width="100%" src="{{asset('images/'.$image->image)}}" alt="">
                                    @break(0)
                                @endforeach
                            </a>
                        </div>
                        <b>
                            <a href="{{route('necklaces.index')}}" class="animation2" tabindex="-1">Shop Necklaces &gt;</a>
                        </b>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                   <div class="cart">
                       <div class="cart-body">
                           <a href="{{route('earrings.index')}}">
                               @foreach($earring->images as $key => $image)
                                   <img width="100%" src="{{asset('images/'.$image->image)}}" alt="">
                                   @break(0)
                               @endforeach
                           </a>
                       </div>
                       <b><a href="{{{route('earrings.index')}}}"
                             class="animation2" tabindex="-1">Shop Earrings &gt;</a></b>
                   </div>
               </div>
                <div class="col-6 col-md-3">
                    <div class="cart">
                        <div class="cart-body">
                            <a href="{{route('rings.index')}}">
                                @foreach($ring->images as $key => $image)
                                    <img width="100%" src="{{asset('images/'.$image->image)}}" alt="">
                                    @break(0)
                                @endforeach
                            </a>
                        </div>
                        <b><a href="{{route('rings.index')}}"
                              class="animation2" tabindex="-1">Shop Rings &gt;</a></b>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="cart">
                        <div class="cart-body">
                            <a href="{{route('bracelets-bangles.index')}}">
                                @foreach($braceletsAndBangles->images as $key => $image)
                                    <img width="100%" src="{{asset('images/'.$image->image)}}" alt="">
                                    @break(0)
                                @endforeach
                            </a>
                        </div>
                        <b><a href="{{route('bracelets-bangles.index')}}"
                              class="animation2" tabindex="-1">Shop Bacelets & Bangles &gt;</a></b>
                    </div>
                </div>
            </div>
        </div>
        {{--              Best Seller          --}}
        <div class="layout">
            <div class="title">
                Best Seller
            </div>
        </div>
        <div class="layout">
            <div class="owl-carousel owl-theme">
                @foreach($bestSeller as $product)
                    <div class="cart">
                        <div class="cart-body">
                            <a href="{{route('home.detailProduct',$product->id)}}">
                                @foreach($product->images as $key => $image)
                                    <img src="{{asset('images/'.$image->image)}}" alt="">
                                    @break(0)
                                @endforeach
                            </a>
                        </div>
                        <b><a href="{{route('home.detailProduct',$product->id)}}"
                              class="animation" tabindex="-1">Shop Now &gt;</a></b>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="banner px-5">
        <img width="100%" src="{{asset('front-end/images/banner.jpg')}}" alt="">
    </div>
@endsection
@section('js')
    <script>
        $(function (){
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
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
        })
    </script>
@endsection
