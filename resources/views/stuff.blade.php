@extends('layouts.frontend_master')

@section('pages')
	active
@endsection
@section('stuff')
	active
@endsection
@section('frontend_content')
  <!-- Start All Pages -->
  	<div class="all-page-title page-breadcrumb">
  		<div class="container text-center">
  			<div class="row">
  				<div class="col-lg-12">
  					<h1>Stuff</h1>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- End All Pages -->

  	<!-- Start Stuff -->
  	<div class="stuff-box">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="heading-title text-center">
  						<h2>Stuff</h2>
  					</div>
  				</div>
  			</div>
  			<div class="row">
          @forelse ($stuffs as $stuff)
            <div class="col-md-4 col-sm-6">
  					<div class="our-team">
  						<img src="{{ asset('uploads/stuff') }}/{{ $stuff->stuff_image }}">
  						<div class="team-content">
  							<h3 class="title">{{ $stuff->name_of_stuff }}</h3>
  							<span class="post">{{ $stuff->position_of_stuff }}</span>
  							<ul class="social">
  								<li><a href="{{ $stuff->stuff_fb_link }}"><i class="fa fa-facebook-f"></i></a></li>
  								<li><a href="{{ $stuff->stuff_twitter_link }}"><i class="fa fa-twitter"></i></a></li>
  								<li><a href="{{ $stuff->stuff_google_plus_link }}"><i class="fa fa-google-plus"></i></a></li>
  							</ul>
  						</div>
  					</div>
  				</div>
				@empty
					<div class="col-12 text-center">
						<div class="alert alert-danger">
							<strong>No data to show</strong>
						</div>
					</div>
				@endforelse
  			</div>
  		</div>
  	</div>
  	<!-- End Stuff -->
    <!-- Start Customer Reviews -->
  	<div class="customer-reviews-box">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="heading-title text-center">
  						<h2>Customer Reviews</h2>
							@forelse ($review_headings as $review_heading)
								<p>{{ $review_heading->review_headings }}</p>
							@empty
								<div class="alert alert-danger">
									<strong>No data to show</strong>
								</div>
							@endforelse
  					</div>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-8 mr-auto ml-auto text-center">
  					<div id="reviews" class="carousel slide" data-ride="carousel">
  						<div class="carousel-inner mt-4">
  							@foreach ($customer_reviews as $review)
  								<div class="carousel-item text-center {{ $loop->first ?'active':'' }}">
  								<div class="img-box p-1 border rounded-circle m-auto">
  									<img class="d-block w-100 rounded-circle" src="{{ asset('uploads/review') }}/{{ $review->author_image }}" alt="">
  								</div>
  								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">{{ $review->review_author_name }}</strong></h5>
  								<h6 class="text-dark m-0">{{ $review->author_position }}</h6>
  								<p class="m-0 pt-3">{{ $review->review }}</p>
  							</div>
  							@endforeach
  						</div>
  						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
  							<i class="fa fa-angle-left" aria-hidden="true"></i>
  							<span class="sr-only">Previous</span>
  						</a>
  						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
  							<i class="fa fa-angle-right" aria-hidden="true"></i>
  							<span class="sr-only">Next</span>
  						</a>
            </div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- End Customer Reviews -->
@endsection
