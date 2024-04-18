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
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<form action="{{route('checkout.store')}}" method="POST" name="frm-billing">
                        @csrf
						<p class="row-in-form">
							<label for="first_name">first name<span>*</span></label>
							<input type="text" name="first_name" value="" placeholder="Your name">
						</p>
						<p class="row-in-form">
                            <label for="last_name">Last Name<span>*</span></label>
                            <input type="text" name="last_name" value="" placeholder="Your last name">
                        </p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input type="email" name="email" value="" placeholder="Type your email">
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input type="number" name="phone_number" value="" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="street_address">Street Address:</label>
							<input type="text" name="street_address" value="" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input type="text" name="country" value="" placeholder="United States">
						</p>
						<p class="row-in-form">
							<label for="postal_code">Postcode / ZIP:</label>
							<input type="number" name="postal_code" value="" placeholder="Your postal code">
						</p>
						<p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input type="text" name="city" value="" placeholder="City name">
						</p>

				</div>
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<div class="choose-payment-methods">
                            <!--here put code options of payment-->
						</div>
						<p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">$ {{ $cart->total() }}</span></p>
                        <button type="submit" class="btn btn-medium">Place Order Now</button>
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
