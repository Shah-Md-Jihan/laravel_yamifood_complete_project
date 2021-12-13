@extends('layouts.frontend_master')

@section('about')
	active
@endsection
@section('frontend_content')
  <!-- Start header -->
  	<div class="all-page-title page-breadcrumb">
  		<div class="container text-center">
  			<div class="row">
  				<div class="col-lg-12">
  					<h1>About Us</h1>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- End header -->

  	<!-- Start About -->
  	<div class="about-section-box">
  		<div class="container">
  			<div class="row">
          @foreach($about_contents as $about_content)
  				<div class="col-lg-6 col-md-6">
  					<img src="{{ asset('uploads/About_Image') }}/{{ $about_content->about_image }}" alt="" class="img-fluid">
  				</div>
  				<div class="col-lg-6 col-md-6 text-center">
  					<div class="inner-column">
  						<h1>Welcome To <span>Yamifood Restaurant</span></h1>
  						<h4>Little Story</h4>
  						<p>{{ $about_content->story }}</p>
  						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
  					</div>
  				</div>
  				<div class="col-md-12">
  					<div class="inner-pt">
  						<p>{{ $about_content->long_story }}</p>
  					</div>
  				</div>
          @endforeach
  			</div>
  		</div>
  	</div>
  	<!-- End About -->

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
@endsection
