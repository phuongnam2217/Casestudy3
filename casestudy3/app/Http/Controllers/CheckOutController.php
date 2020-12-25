<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    public function checkout(){
        $cart = session('cart');
        return view('customer.checkout',compact('cart'));
    }
    public function createOrder(CreateOrderRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->note = $request->note;
        $order->save();
        $orderId = $order->id;
        $cart = session('cart');
        foreach ($cart->items  as $item)
        {
            $product_id = $item['product']->id;
            $quantity = $item['totalQty'];
            $priceEach = $item['product']->price;
            $total = $item['totalPrice'];
            DB::table('order_details')->insert([
                'order_id'=>$orderId,
                'product_id'=>$product_id,
                'quantity'=>$quantity,
                'priceEach'=>$priceEach,
                'total'=>$total
            ]);
        };
        session()->forget('cart');
        return  redirect()->route('home.index')->with('success',"You ordered successfully");
    }
}
