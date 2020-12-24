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
        session()->put('cart',$cart);
        $newCart = session('cart')->items;
        $success = "Add ". $product->name ." To Card Successfully";
        $qty = session('cart')->totalQty;
        $totalPrice = session('cart')->totalPrice;
        $output = $this->output($newCart);
        return response()->json(['qty'=>$qty,'success'=>$success,'cart'=>$output,'total'=>$totalPrice]);
    }
    public function addMany($idProduct,Request $request)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->add($product,$request->quantityBtn);
        session()->put('cart',$cart);
        $newCart = session('cart')->items;
        $success = "Add ". $product->name ." To Card Successfully";
        $qty = session('cart')->totalQty;
        $output = $this->output($newCart);
        $totalPrice = session('cart')->totalPrice;
        return response()->json(['qty'=>$qty,'success'=>$success,'cart'=>$output,'total'=>$totalPrice]);
    }
    public function delete($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->delete($idProduct);
        if(count($cart->items) > 0){
            session()->put('cart',$cart);
            $newCart = session('cart')->items;
            $success = "Remove ". $product->name ." To Card Successfully";
            $qty = session('cart')->totalQty;
            $totalPrice = session('cart')->totalPrice;
            $output = $this->output($newCart);
            return response()->json(['qty'=>$qty,'success'=>$success,'cart'=>$output,'total'=>$totalPrice]);
        }else{
            session()->forget('cart');
            $qty = 0;
            $totalPrice = 0;
            $output= ' <div class="cart-empty">
                        Your shopping cart is empty!
                    </div>';
            return response()->json(['qty'=>$qty,'cart'=>$output,'total'=>$totalPrice]);
        }
    }
    public function decrease($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->decrease($idProduct);
        if(count($cart->items) > 0){
            session()->put('cart',$cart);
            $newCart = session('cart')->items;
            $success = "Decrease ". $product->name ." To Card Successfully";
            $qty = session('cart')->totalQty;
            $totalPrice = session('cart')->totalPrice;
            $output = $this->output($newCart);
            return response()->json(['qty'=>$qty,'success'=>$success,'cart'=>$output,'total'=>$totalPrice]);
        }else{
            session()->forget('cart');
            $qty = 0;
            $totalPrice = 0;
            $output= ' <div class="cart-empty">
                        Your shopping cart is empty!
                    </div>';
            return response()->json(['qty'=>$qty,'cart'=>$output,'total'=>$totalPrice]);
        }
    }
    public function removeAll()
    {
        session()->forget('cart');
        return back();
    }
    function output($newCart)
    {
        $output = "";
        $output .= '<div class="list">';
        foreach ($newCart as $item){
            $output .= '<div class="row py-2">';
            $output .= '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">';
            $output .= '<a href="'.route('home.detailProduct',$item['product']->id).'" target="_blank">';
            $output .= '<img width="100px" src="'.asset('images/'.$item['product']->images[0]->image).'" alt="" title="">';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
            $output .= '<div class="d-flex justify-content-between">';
            $output .= '<p class="cart-product-name">'.$item['product']->name.'</p>';
            $output .= '<a href="javascript:void(0)" data-id="'.$item['product']->id.'" class="remove-product">';
            $output .= '<span class="remove-product">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a></div>';
            $output .= '<div class="row" style="display:inline-block;">';
            $output .= '<div class="col-12 d-flex align-items-center">';
            $output .= '<p class="cart-product-price">'.$item['product']->price.' $</p>';
            $output .= '<div class="input-group cartedit">';
            $output .= '<div class="d-flex justify-content-center">';
            $output .= '<div class="quantity-input">';
            $output .= '<input id="quantityBtn" name="quantityBtn" type="text" value="'.$item['totalQty'].'">';
            $output .= '<a href="javascript:void(0)" data-id="'.$item['product']->id.'" class="descrease-product" >-</a>';
            $output .= '<a href="javascript:void(0)" data-id="'.$item['product']->id.'" class="add-product" >+</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        $output .='<div class="">
                            <div class="total">
                                <div class="total-title">
                                    Total
                                </div>
                                <div class="total-price">'
                                    .session('cart')->totalPrice.' $
                                </div>
                            </div>
                            <div class="modal-checkout d-flex justify-content-center align-items-center py-3">
                                <a href="'.route('checkout.index').'" class="btnCheckout">GO TO CHECK OUT</a>
                            </div>
                        </div>';
        return $output;
    }
}
