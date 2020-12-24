<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="row">
            <div class="col-3">
                <img width="100%" src="{{asset('front-end/images/logo.png')}}" alt="">
            </div>
            <div class="col-6">
                <h1 class="text-center">Hóa Đơn Thanh Toán</h1>
            </div>
            <div class="col-3">
                <p>Ngày ... Tháng ... Năm</p>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-6">
                <h2 class="text-center">Thông tin đơn hàng</h2>
                <p>Mã đơn hàng :  {{$order->id}}</p>
                <p>Ghi chú : {{$order->note}}</p>
            </div>
            <div class="col-6">
                <h2 class="text-center">Thông tin khách hàng</h2>
                <p>Họ và tên : {{$order->customer->name}}</p>
                <p>Email : {{$order->customer->email}}</p>
                <p>Số điện thoại : {{$order->customer->phone}}</p>
                <p>Địa chỉ giao hàng : {{$order->customer->address}}</p>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12">
                <h2 class="text-center">Danh sách sản phẩm</h2>
                <table class="mb-0 table table-bordered" id="table-product">
                    <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>{{$item->pivot->quantity}}</td>
                            <td>{{$item->price}} $</td>
                            <td>
                                {{$item->pivot->total}} $
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Tổng tiền: {{$total}} $</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col">
                <p class="text-center">Người mua hàng</p>
            </div>
            <div class="col">
                <p class="text-center">Người bán hàng</p>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
