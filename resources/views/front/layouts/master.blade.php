<!DOCTYPE html>
<html lang="en">
<head>

    @include('front.layouts.heade')

</head>
<body class="home-page home-01 ">
	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	@include('front.layouts.header')

	@yield('content')


	@include('front.layouts.footer')


    @include('front.layouts.footer-scripts')

	@include('layouts.footer')
</body>
</html>
