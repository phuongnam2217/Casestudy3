<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function index($id)
    {
        $orders = Order::where('status',$id)->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $total = 0;
        foreach ($order->products as $item) {
            $total += $item->pivot->total;
        }
        return view('admin.orders.detail', compact('order', 'total'));
    }

    public function confirmed($id)
    {
        $order =  $order = Order::findOrFail($id);
        if($order->status == StatusOrderConst::WAITING){
            $order->status = StatusOrderConst::SHIPPING;
            foreach ($order->products as $item)
            {
                $product = Product::findOrFail($item->id);
                $product->stock -= $item->pivot->quantity;
                $product->save();
            }
            $order->save();
            return back()->with('success',"This order status shipping");
        }elseif ($order->status == StatusOrderConst::SHIPPING)
        {
            $order->status = StatusOrderConst::SUCCESS;
            $order->save();
            return back()->with('success',"This order status success");
        }
    }

    public function cancelOrder($id)
    {
        $order =  $order = Order::findOrFail($id);
        if($order->status == StatusOrderConst::SHIPPING){
            foreach ($order->products as $item)
            {
                $product = Product::findOrFail($item->id);
                $product->stock += $item->pivot->quantity;
                $product->save();
            }
        }
        $order->status = StatusOrderConst::CANCEL;
        $order->save();
        return back()->with('success','This order status cancel');
    }

    public function print_order($id)
    {
        $pdf = PDF::loadHTML($this->print_order_convert($id));
        return $pdf->download('order.pdf');
    }

    public function print_order_convert($id)
    {
        $order = Order::findOrFail($id);
        $total = 0;

        $output = "";

        $output .=
                '<style>
                     body{
                        font-family: "DejaVu Sans";
                     }
                     table, th, tr, td {
                     border: 1px solid black;
                     border-collapse: collapse;
                     text-align: center;
                     }
                     .left{
                        float: left;
                        font-size: 20px;
                     }
                     .right{
                     float: right;
                     font-size: 20px;
                     }
                     .clearfix{
                        clear: both;
                     }
                </style>
                <h1><center>Công ty TNHH Phương Nam</center></h1>
                <h3><center>HÓA ĐƠN THANH TOÁN</center></h3>
                <h4><center>Thông tin khách hàng</center></h4>

                <p class="left">Mã hóa đơn '. $order->id .'</p>
                <p class="right">Ngày... Tháng ... Năm</p>
                <div class="clearfix"></div>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ giao hàng</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>'.$order->customer->name.'</td>
                <td>'.$order->customer->email.'</td>
                <td>'.$order->customer->phone.'</td>
                <td>'.$order->customer->address.'</td>
                </tr>
                </tbody>
                </table>
                <h3><center>Thông tin đơn hàng</center></h3>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Tổng tiền</th>
                </tr>
                </thead>
                <tbody>';
            foreach ($order->products as $item){
                $total += $item->pivot->total;
                $output .= '
                <tr>
                <td>'.$item->id.'</td>
                <td>'.$item->name.'</td>
                <td>'.$item->pivot->quantity.'</td>
                <td>'.$item->price.' $</td>
                <td>'.$item->pivot->total.' $</td>
                </tr>';
            };
            $output .= '</tbody>
                        <tfoot>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Tổng giá đơn hàng :'.$total.' $</td>
                        </tr>
                        </tfoot>
                        </table>';
            $output .= '
                <p class="left">Người lập Phiếu</p>
                <p class="right">Người nhận</p>
            ';
        return $output;
    }
}
