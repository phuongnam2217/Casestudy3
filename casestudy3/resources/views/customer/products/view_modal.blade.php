<div class="modal-header">
    <button type="button" class="btn-close my-btn" data-bs-dismiss="modal" aria-label="Close">
    </button>
    <h5 class="modal-title h3" id="exampleModalFullscreenLabel">your cart
        <span id="CartQty" style="">
                        {{$newCart->totalQty}}
                    </span>
    </h5>
</div>
<div class="modal-body">
        <div class="list">
            @foreach($newCart->items as $item)
                <div class="row py-2">
                    <div class="col-4 d-flex justify-content-center">
                        <a href="{{route('home.detailProduct',$item['product']->id)}}" target="_blank">
                            <img width="100px" src="{{asset('images/'.$item['product']->images[0]->image)}}"
                                 alt="" title="">
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-between">
                            <p class="cart-product-name">
                                {{$item['product']->name}}
                            </p>
                            <a href="javascript:void(0)" data-id="{{$item['product']->id}}"
                               class="remove-product">
                                            <span class="">
                                            <i class="fas fa-trash"></i>
                                        </span>
                            </a>
                        </div>
                        <div class="row" style="display:inline-block;">
                            <div class="col-12 d-flex align-items-center">
                                <p class="cart-product-price">{{$item['product']->price}} $</p>
                                <div class="input-group cartedit">
                                    <div class="d-flex justify-content-center">
                                        <div class="quantity-input">
                                            <input id="quantityBtn" type="text"
                                                   value="{{$item['totalQty']}}">
                                            <a href="javascript:void(0)" data-id="{{$item['product']->id}}"
                                               class="descrease-product">-</a>
                                            <a href="javascript:void(0)" data-id="{{$item['product']->id}}"
                                               class="add-product">+</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="">
            <div class="total">
                <div class="total-title">
                    Total
                </div>
                <div class="total-price">
                    {{$newCart->totalPrice}} $
                </div>
            </div>
            <div class="modal-checkout d-flex justify-content-center align-items-center py-3">
                <a href="{{route('checkout.index')}}" class="btnCheckout">GO TO CHECK OUT</a>
            </div>
        </div>
</div>
