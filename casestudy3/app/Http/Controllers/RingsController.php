<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RingsController extends Controller
{
    public function index(){
        $products = Product::where('category_id','=',4)->paginate(3);
        $sorts = "default";
        $orders = "default";
        $value = 3;
        return view('customer.categories.rings',compact('products','sorts','orders','value'));
    }
//    public function sort($sort,$order)
//    {
//        if($sort == "default" && $order == "default"){
//            $products = Product::where('category_id','=',2)->paginate(4);
//            return view('customer.categories.necklaces',compact('products'));
//        }
//        $products = Product::where('category_id','=',2)
//            ->orderBy($sort,$order)
//            ->paginate(6);
//        $sorts = $sort;
//        $orders = $order;
//        return view('customer.categories.necklaces',compact('products','sorts','orders'));
//    }
    public function sortPagination($sort,$order,$value)
    {
        if($sort == "default" && $order == "default"){
            $products = Product::where('category_id','=',4)->paginate($value);
            $sorts = $sort;
            $orders = $order;
            return view('customer.categories.rings',compact('products','sorts','orders','value'));
        }
        $products = Product::where('category_id','=',4)
            ->orderBy($sort,$order)
            ->paginate($value);
        $sorts = $sort;
        $orders = $order;
        return view('customer.categories.rings',compact('products','sorts','orders','value'));
    }
}
