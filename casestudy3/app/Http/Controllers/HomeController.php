<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status','1')->orderBy('id','desc')->take(10)->get();
        $bestSeller = Product::where('status','1')->orderBy('sold','desc')->take(10)->get();

        $necklace = Product::where('category_id',2)->orderBy('created_at','desc')->first();
        $earring = Product::where('category_id',3)->orderBy('created_at','desc')->first();
        $ring = Product::where('category_id',4)->orderBy('created_at','desc')->first();
        $braceletsAndBangles = Product::where('category_id',5)->orderBy('created_at','desc')->first();
//        dd($necklace);
        return view('customer.index',compact('products','bestSeller','necklace','earring','ring','braceletsAndBangles'));
    }

    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        $view = $product->view;
        $view++;
        $product->view = $view;
        $product->save();
        return view('customer.products.detail',compact('product'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','LIKE',"%$search%")->get();
        if($search == null)
        {
            $products = null;
        }

        return view('customer.products.search',compact('products'));
    }

}
