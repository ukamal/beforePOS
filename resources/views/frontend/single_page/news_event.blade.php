@extends('frontend.layouts.master')
@section('content')
	<!-- Banner Section -->
	<section class="banner_part">
		<img src="{{ asset('frontend/image/banner.jpg')}}" style="width: 100%">
	</section>

	<section class="nesw_events" style="background: #ddd">
		<div class="container">
			<div class="row">
				<div class="col-md-3" style="padding-top: 15px;">
					<h3 style="border-bottom: 1px solid #000;width: 85%">News and Events</h3>
				</div>
				<div class="col-md-9" style="padding-top: 15px;">
					<table class="table table-striped table-bordered table-hover table-md table-warning">
						<thead class="thead-dark">
							<tr>
								<th>SL</th>
								<th>Date</th>
								<th>Image</th>
								<th>Title</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($news as $key => $new)
							<tr>
								<td>{{$key+1}}</td>
								<td style="width: 15%">{{date('d-m-Y',strtotime($new->date))}}</td>
								<td><img src="{{ asset('upload/newsevent_image/'.$new->image) }}" style="width: 200px;height: 150px;"></td>
								<td>{{$new->short_title}}</td>
								<td><a href="{{route('news-detaile',$new->id)}}" class="btn btn-info">Details</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

@endsection