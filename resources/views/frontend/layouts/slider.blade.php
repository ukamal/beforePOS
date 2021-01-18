@php
 $count = 0;
@endphp
<!-- Slider Section -->
	<section class="slider_part">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		      @foreach($sliders as $key => $slider)
		        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="@if($count == 0){ active } @endif"></li>
		      @endforeach
		    </ol>
		    <div class="carousel-inner" role="listbox">
			@foreach($sliders as $slider)
			  <div class="carousel-item @if($count == 0){ active } @endif" style="background-image: url({{ asset('upload/slider_image/'.$slider->image)}})">
			    <div class="carousel-caption d-none d-md-block">
			      <h2 class="display-4">{{$slider->short_title}}</h2>
			      <p class="lead">{{$slider->long_title}}</p>
			    </div>
			  </div>
			  @php
			  $count++
			  @endphp
			@endforeach
		    </div>
		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		          <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
	        </a>
		</div>
	</section>