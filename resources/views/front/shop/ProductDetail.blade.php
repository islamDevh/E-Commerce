@extends('front.layouts.master')
@section('content')
<!--main area-->
	<!--main area-->
	<main id="main" class="main-site">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>detail</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
							  <ul class="slides">
							    <li data-thumb="{{ asset($product->image) }}">
							    	<img src="{{ asset($product->image) }}" alt="product thumbnail" />
							    </li>
								@foreach ($imageProducts as $imageProduct)
							    <li data-thumb="{{ asset($imageProduct->image) }}">
							    	<img src="{{ asset($imageProduct->image) }}" alt="product thumbnail" />
							    </li>
								@endforeach
							  </ul>
							</div>
						</div>
						<div class="detail-info">
							<form action="{{route('cart.store')}}" method="POST">
							@csrf
                            <h2 class="product-name">{{$product->name}}</h2>
                            <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
							<input type="hidden" name="price" value="{{$product->price}}">
							<input type="hidden" name="price" value="{{$product->price}}">
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<div class="stock-info in-stock">
							<input type="hidden" name="offer" value="{{$product->offer}}">
                                <p class="availability">Offer: <b>I{{$product->offer}}</b></p>
                            </div>
							<div class="quantity">
                            	<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="5" pattern="[0-9]*" >
									<a class="btn btn-reduce" href="#"></a>
									<a class="btn btn-increase" href="#"></a>
								</div>
							</div>
							<div class="wrap-butons">
								
								<button class="btn add-to-cart">Add to Cart</button>
								</form>

                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
							</div>
							
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">description</a>
								<a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
									<p>{{$product->description}}.</p>
								</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
											</tr>
											<tr>
												<th>Color</th><td><p>{{$product->color}}</p></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

				

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Related Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{URL::asset('front/assets')}}/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
<!--main area-->
@endsection
