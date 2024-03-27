@extends('front.layouts.master')
@section('content')
<!--main area-->
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-shop-control">
                    <h1 class="shop-title">Category & Phones</h1>
                </div><!--end wrap shop control-->
                <div class="row">
                @foreach ($Products as $Product)
                    <ul class="product-list grid-products equal-container">
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('ProductDetail.index', $Product->id) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset($Product->image) }}"  alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
                </div>

                <div class="wrap-pagination-info">
                    <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                            <li class="category-item">
                                <a href="#" class="cate-link">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p>
                    </div>
                </div><!-- Price-->
                

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Color</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                    </div>
                </div><!-- Size -->
            </div><!--end sitebar-->
        </div><!--end row-->
    </div><!--end container-->
</main>
<!--main area-->
@endsection
