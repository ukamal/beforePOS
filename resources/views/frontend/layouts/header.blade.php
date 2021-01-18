<!-- Header Section -->
	<section class="header">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<a href="{{ url('/')}}" class="navbar-brand"><img src="{{ asset('upload/logo_image/'.$logo->image) }}" style="height: 50px;"></a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<div class="navbar-nav popular">
						<a href="{{ url('/')}}" class="nav-item nav-link active">Home</a>
						<div class="nav-item dropdown">
							<a href="{{route('about-us')}}" class="nav-link dropdown-toggle" data-toggle="dropdown">About Us</a>
							<div class="dropdown-menu" style="background: #BADDFB;">
								<a href="{{ Route('about-us') }}" class="dropdown-item">About Us</a>
								<a href="{{route('mission')}}" class="dropdown-item">Mission</a>
								<a href="{{route('vision')}}" class="dropdown-item">Vision</a>
							</div>
						</div>
						<a href="{{route('news-event')}}" class="nav-item nav-link">News and Event</a>
						<a href="{{ route('contact-us') }}" class="nav-item nav-link">Contact Us</a>
						<a href="{{route('login')}}" class="nav-item nav-link">Login</a>
					</div>
					<div class="navbar-nav">
						<form class="form-inline">
							<div class="input-group">
								<input type="text" name="search" placeholder="Search">
								<div class="input-group-append">
									<button type="button" class="btn btn-secondary">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</nav>
		</div>
	</section>