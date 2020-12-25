<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addtoCart($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);
        return $this->existCart($cart,$product,"Add");
    }
    public function addMany($idProduct,Request $request)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->add($product,$request->quantityBtn);
        return $this->existCart($cart,$product,"Add");
    }
    public function delete($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->delete($idProduct);
        if(count($cart->items) > 0){
            return $this->existCart($cart,$product,"Remove");
        }else{
            return $this->noCart();
        }
    }
    public function decrease($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->decrease($idProduct);
        if(count($cart->items) > 0){
            return $this->existCart($cart,$product,"Decrease");
        }else{
            return $this->noCart();
        }
    }
    public function removeAll()
    {
        session()->forget('cart');
        return back();
    }

    public function existCart($cart,$product,$message)
    {
        session()->put('cart',$cart);
        $newCart = session('cart');
        $html = view('customer.products.view_modal',compact('newCart'))->render();
        $success = "$message ". $product->name ." To Card Successfully";
        $qty = session('cart')->totalQty;
        return response()->json(['cart'=>$html,'qty'=>$qty,'success'=>$success]);
    }
    public function noCart()
    {
        session()->forget('cart');
        $qty = 0;
        $totalPrice = 0;
        $html = view('customer.products.not_products',compact('qty'))->render();
        return response()->json(['qty'=>$qty,'cart'=>$html,'total'=>$totalPrice]);
    }
}
