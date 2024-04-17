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
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <h1 style="font-size: 20px;">{{ session()->get('success') }}</h1>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class=" main-content-area">
                <form action="{{ route('cart.checkout') }}" method="POST"> <!-- Form for checkout -->
                    @csrf <!-- CSRF protection -->
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">Products Name</h3>
                        @foreach($cart->get() as $item)
                            <ul class="products-cart">
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset($item->product->image)}}" alt="image"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                            href="">{{$item->product->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">${{$item->product->price}}</p>
                                    </div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="quatity" value="{{$item->quantity}}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-increase" href="#"></a>
                                            <a class="btn btn-reduce" href="#"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">sub-total: ${{ ($item->product->price * $item->quantity) }}</p>
                                    </div>
                                    <div class="delete">
                                        <a href="#" class="btn btn-delete" title="Delete from your cart">
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
                            <p class="summary-info" style="font-size: 18px;">
                                <span class="title" style="font-weight: bold; font-size: 24px;">Total:</span>
                                <span class="index" style="font-weight: bold; color: #333; font-size: 20px;">$ </span>
                            </p>
                        </div>

                        <div class="checkout-info">
                            <button type="submit" class="btn btn-checkout">Check out</button> <!-- Checkout button -->
                            <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i></a>
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

@endsection
