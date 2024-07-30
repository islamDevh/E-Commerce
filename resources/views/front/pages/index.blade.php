@extends('front.layouts.master')
@section('content')
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('front.index')}}" class="link">home</a></li>
					<li class="item-link"><span>{{ $page['title'] }}</span></li>
				</ul>
			</div>
		</div>
		<div class="container pb-60">
			<div class="row">
				<div class="col-md-12">
					<h3>{{ $page['title'] }}</h3>
                    <p>{!! $page['content'] !!}</p>
				</div>
			</div>
		</div><!--end container-->
	</main>

@endsection
