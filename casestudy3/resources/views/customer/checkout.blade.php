<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('front-end/css/checkout.css')}}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>
<div class="card">
    <div class="card-top text-center"><a href="{{route('home.index')}}"> Back to shop</a> <span
            id="logo">Check Out</span></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"><span class="header">Infomation Customer</span>
                    </div>
                    <form action="{{route('checkout.createOrder')}}" method="POST">
                        @csrf
                        <span>Name</span>
                        <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>Email</span>
                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>Address</span>
                        <input name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>Phone Number:</span>
                        <input name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>Order notes:</span>
                        <textarea name="note" class="form-control" placeholder="Order noter"></textarea>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            Launch demo modal
                        </button>
                        <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="font-size:1.5rem">
                                        Are you sure to order this ?
                                    </div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary" style="background: #b3b3b3;border: none" data-bs-dismiss="modal">Close
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary">Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Your Cart</div>
                    {{--                    <span>{{$cart->totalQty}} items</span>--}}
                    @foreach($cart->items as $item)
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="img-fluid"
                                                                      src="{{asset('images/'.$item['product']->images[0]->image)}}">
                            </div>
                            <div class="col-8">
                                <div class="row"><b>$ {{$item['product']->price}}</b></div>
                                <div class="row text-muted">{{$item['product']->name}}</div>
                                <div class="row">Quantity: {{$item['totalQty']}}</div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Subtotal</div>
                        <div class="col text-right">$ {{$cart->totalPrice}}</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Delivery</div>
                        <div class="col text-right">Free</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b>$ {{$cart->totalPrice}}</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
</script>
<script>
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
@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}")
    </script>
@endif
@yield('js')
</body>
</html>
