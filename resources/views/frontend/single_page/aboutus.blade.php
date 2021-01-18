@extends('frontend.layouts.master')
@section('content')
	<!-- Banner Section -->
	<section class="banner_part">
		<img src="{{ asset('frontend/image/banner.jpg')}}" style="width: 100%">
	</section>

	<!-- About us Section -->
	<section class="about_us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 11%;">About Us</h3>
					<p>{{@$about->description}}</p>
				</div>
			</div>
		</div>
	</section>

@endsection