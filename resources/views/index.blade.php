@extends('layouts.frontend_master')

@section('home')
	active
@endsection
@section('frontend_content')
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			@foreach ($sliders as $slider)
				<li class="text-center">
				<img src="{{ asset('uploads/slider') }}/{{ $slider->slider_image }}" alt="not found">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
							<p class="m-b-40">{{ $slider->slider_description }}</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					@forelse ($about_contents as $about_content)
					<img src="{{ asset('uploads/About_Image') }}/{{ $about_content->about_image }}" alt="not found" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Yamifood Restaurant</span></h1>
						<h4>Little Story</h4>
							<p class="text-justify">{{ $about_content->story }}</p>
						@empty
							<div class="alert alert-danger">
								<span class="text-danger">No Data To Show</span>
							</div>
						@endforelse
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					@forelse ($words as $word)
						<p class="lead">
							"{{ $word->words }}"
						</p>
						<span class="lead">{{ $word->author }}</span>
					@empty
						<div class="alert alert-danger">
							<strong>No data to show</strong>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						@forelse ($menu_category_headings as $menu_category_heading)
							<p>{{ $menu_category_heading->menu_headings }}</p>
						@empty
							<div class="alert alert-danger">
								<span>No data to show</span>
							</div>
						@endforelse
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							@foreach ($menu_categories as $category)
								<button data-filter=".{{ $category->id }}">{{ $category->menu_category_name }}</button>
							@endforeach
						</div>
					</div>
				</div>
			</div>
				<div class="row special-list">
					@forelse ($menu_products as $menu_product)
						<div class="col-lg-4 col-md-6 special-grid {{ $menu_product->menu_category_id }}">
							<div class="gallery-single fix">
								<img src="{{ asset('uploads/menus') }}/{{ $menu_product->menu_thumbnail }}" class="img-fluid" alt="Image">
								<div class="why-text">
									<h4>{{ $menu_product->menu_name }}</h4>
									<p>{{ $menu_product->menu_details }}</p>
									<h5>${{ $menu_product->menu_price }}</h5>
								</div>
							</div>
						</div>
					@empty
						<div class="col-12">
							<div class="alert alert-danger">
								<span>No Menu Item To Show</span>
							</div>
						</div>
					@endforelse
			</div>
		</div>
	</div>
	<!-- End Menu -->

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						@forelse ($gallery_headings as $heading)
							<p>{{ $heading->gallery_headings }}</p>
						@empty
							<div class="alert alert-danger text-center">
								<strong>No data to show</strong>
							</div>
						@endforelse
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					@forelse ($gallery_images as $images)
						<div class="col-sm-12 col-md-4 col-lg-4">
							<a class="lightbox" href="{{ asset('uploads/gallery') }}/{{ $images->gallery_image }}">
								<img class="img-fluid" src="{{ asset('uploads/gallery') }}/{{ $images->gallery_image }}" alt="Gallery Images">
							</a>
						</div>
					@empty
						<div class="col-12">
							<div class="alert alert-danger text-center">
								<strong>No data to show</strong>
							</div>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->


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
