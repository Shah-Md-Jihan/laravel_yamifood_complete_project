@extends('layouts.frontend_master')

@section('blog')
  active
@endsection
@section('frontend_content')
  	<!-- Start All Pages -->
  	<div class="all-page-title page-breadcrumb">
  		<div class="container text-center">
  			<div class="row">
  				<div class="col-lg-12">
  					<h1>Blog</h1>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- End All Pages -->

  	<!-- Start blog -->
  	<div class="blog-box">
  		<div class="container">
  			<div class="row">
          @forelse ($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-12">
  					<div class="blog-box-inner">
  						<div class="blog-img-box">
  							<img class="img-fluid" src="{{ asset('frontend_assets') }}/images/blog-img-01.jpg" alt="">
  						</div>
  						<div class="blog-detail">
  							<h4>{{ $blog->blog_title }}</h4>
  							<ul>
  								<li><span>Post by {{ $blog->admin_name }}</span></li>
  								<li>|</li>
  								<li><span>{{ $blog->created_at->format('d M Y') }}</span></li>
  							</ul>
  							<p>{{ Str::limit($blog->blog_description, 280) }}</p>

  							<a class="btn btn-lg btn-circle btn-outline-new-white" href="{{ url('/blog/details') }}/{{ $blog->id }}">Read More</a>
  						</div>
  					</div>
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
  	<!-- End blog -->
@endsection
