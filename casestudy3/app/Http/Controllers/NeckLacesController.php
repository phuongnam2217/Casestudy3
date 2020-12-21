<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class NeckLacesController extends Controller
{
    public function index(){
        $products = Product::where('category_id','=',2)->paginate(4);
        $sorts = "";
        $orders = "";
        return view('customer.categories.necklaces',compact('products','sorts','orders'));
    }
    public function sort($sort,$order)
    {
        if($sort == "default" && $order == "default"){
            $products = Product::where('category_id','=',2)->paginate(4);
            return view('customer.categories.necklaces',compact('products'));
        }
        $products = Product::where('category_id','=',2)
            ->orderBy($sort,$order)
            ->paginate(4);
        $sorts = $sort;
        $orders = $order;
        return view('customer.categories.necklaces',compact('products','sorts','orders'));
    }
}
