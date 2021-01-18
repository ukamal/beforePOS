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
					<img src="{{ asset('upload/newsevent_image/'.$news->image) }}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px;width: 60%;height: 300px">
					<p>Date: {{date('d-m-Y',strtotime($news->date))}}</p>
					<p>{{$news->short_title}}</p>
					<p style="text-align: justify;"><strong>News & Event</strong> {{$news->long_title}}</p>
				</div>
			</div>
		</div>
	</section>

@endsection