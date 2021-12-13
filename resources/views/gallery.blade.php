@extends('layouts.frontend_master')

@section('pages')
  active
@endsection
@section('gallery')
  active
@endsection
@section('frontend_content')
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Gallery</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
          @forelse ($galleries as $gallery)
            <div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-01.jpg">
							<img class="img-fluid" src="{{ asset('uploads/gallery') }}/{{ $gallery->gallery_image }}" alt="Gallery Images">
						</a>
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
	</div>
	<!-- End Gallery -->
@endsection
