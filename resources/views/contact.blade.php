@extends('layouts.frontend_master')

@section('contact')
  active
@endsection
@section('frontend_content')
  <!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Contact</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Contact -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
          {{-- contact_message_sent_alert start --}}
          @if (session('contact_message_sent_alert'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <strong>{{ session('contact_message_sent_alert') }}</strong>
              </div>
            </div>
          @endif
          {{-- contact_message_sent_alert end --}}
					<form action="{{ url('/contact/post') }}" method="post">
            @csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Your Name">
                  @error ('name')
                    <strong class="text-danger">{{ $message }}</strong>
                  @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" value="{{ old('email') }}" placeholder="Your Email" class="form-control" name="email">
                  @error ('email')
                    <strong class="text-danger">{{ $message }}</strong>
                  @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" class="form-control" placeholder="Your Message" rows="4">{{ old('message') }}</textarea>
                  @error ('message')
                    <strong class="text-danger">{{ $message }}</strong>
                  @enderror
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" type="submit">Send Message</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
@endsection
