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

			<div class="main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<form id="checkout-form" method="POST" name="frm-billing">
						@csrf
						<p class="row-in-form">
							<label for="first_name">First Name<span>*</span></label>
							<input type="text" name="first_name" value="" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="last_name">Last Name<span>*</span></label>
							<input type="text" name="last_name" value="" placeholder="Your last name">
						</p>
						<p class="row-in-form">
							<label for="email">Email Address:</label>
							<input type="email" name="email" value="" placeholder="Type your email">
						</p>
						<p class="row-in-form">
							<label for="phone">Phone Number<span>*</span></label>
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
							<!-- Add onchange event listeners to radio buttons -->
							<div>
								<input id="stripe" name="payment_method" value="stripe" type="radio" onchange="updateFormAction()">
								<label for="stripe">Checkout with Stripe</label>
								<br>
								<input id="paypal" name="payment_method" value="paypal" type="radio" onchange="updateFormAction()">
								<label for="paypal">Checkout with PayPal</label>
							</div>
						</div>
					</form>

						<p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">$ {{ $cart->total() }}</span></p>
						<button type="submit" form="checkout-form" class="btn btn-medium" onclick="updateFormAction()">Place Order Now</button>
					</div>
				</div>
			</div>
			<!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@endsection
@section('js')
<script>
    function updateFormAction() {
        const form = document.getElementById('checkout-form');
        const stripeRadio = document.getElementById('stripe');
        const paypalRadio = document.getElementById('paypal');

        if (stripeRadio.checked) {
            form.action = "{{ route('checkout.store.stripe') }}";
        } else if (paypalRadio.checked) {
            form.action = "{{ route('checkout.store.paypal') }}";
        }
    }
</script>

@endsection
