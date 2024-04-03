@extends('front.layouts.master')
@section('content')
		<!--main area-->
        <main id="main" class="main-site">

            <div class="container">

                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="#" class="link">home</a></li>
                        <li class="item-link"><span>login</span></li>
                    </ul>
                </div>
                <div class=" main-content-area">
                    <form action="{{ route('cart.checkout') }}" method="POST"> <!-- Form for checkout -->
                        @csrf <!-- CSRF protection -->
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">Products Name</h3>
                        @foreach ($products as $index => $cartItem)
                        <ul class="products-cart">
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset($cartItem->product->image) }}" alt="image"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ asset($cartItem->product->image) }}">{{ $cartItem->product->name }}</a>
                                </div>
                                <div class="price-field produtc-price">
                                    <p class="price">${{ $cartItem->product->price }}</p></div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity[]" value="{{ $product_info[$index]->quantity }}" data-max="5" pattern="[0-9]*" >
                                        <a class="btn btn-increase" href="#"></a>
                                        <a class="btn btn-reduce" href="#"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total"><p class="price">total :$</p></div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title="">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        @endforeach
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>
                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">$512.00</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">$512.00</b></p>
                        </div>
                        <div class="checkout-info">
                            <button type="submit" class="btn btn-checkout">Check out</button> <!-- Checkout button -->
                            <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                            <a class="btn btn-update" href="#">Update Shopping Cart</a>
                        </div>
                    </div>


                </form>
                </div><!--end main content area-->
            </div><!--end container-->

        </main>
        <!--main area-->
@endsection




@section('js')

<script>
    // document.querySelectorAll('.input-quantity').forEach(function(element) {
    //     element.addEventListener('change', function(e) {

    //     }
    // }

    alert('dsddsds')
   ; let content = document.getElementByClassName('input-quantity')[0];
    // let firstChild = content.firstChild.nodeName;
    console.log(content);


</script>
@endsection
