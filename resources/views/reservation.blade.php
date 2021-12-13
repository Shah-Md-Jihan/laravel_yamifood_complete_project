@extends('layouts.frontend_master')

@section('pages')
  active
@endsection
@section('reservation')
  active
@endsection
@section('frontend_content')
  <!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Reservation</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
  <!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Reservation</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
          {{-- reservation_alert start --}}
          @if (session('reservation_alert'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <strong>{{ session('reservation_alert') }}</strong>
              </div>
            </div>
          @endif
          {{-- reservation_alert end --}}
					<div class="contact-block">
						<form action="{{ url('/reservation/post') }}" id="reservation_form" method="post">
              @csrf
							<div class="row">
								<div class="col-md-6">
									<h3>Book a table</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_date" class="datepicker picker__input form-control" name="date" type="text" value="{{ old('date') }}" data-error="Please enter Date">
											<div class="help-block with-errors"></div>
                      @error ('date')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_time" class="time form-control picker__input" name="time" value="{{ old('time') }}" type="text" data-error="Please enter time">
											<div class="help-block with-errors"></div>
                      @error ('time')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" name="person" id="person" data-error="Please select Person">
											  <option disabled selected>Select Person*</option>
                        @for ($i = 1; $i < 7; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
											</select>
											<div class="help-block with-errors"></div>
                      @error ('person')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" value="{{ old('reservation_author_name') }}" name="reservation_author_name" placeholder="Your Name" data-error="Please enter your name">
											<div class="help-block with-errors"></div>
                      @error ('reservation_author_name')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Email" id="email" class="form-control" value="{{ old('reservation_author_email') }}" name="reservation_author_email" data-error="Please enter your email">
											<div class="help-block with-errors"></div>
                      @error ('reservation_author_email')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Numbar" id="phone" class="form-control" value="{{ old('reservation_author_phone') }}" name="reservation_author_phone" data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
                      @error ('reservation_author_phone')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Book Table</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
@endsection
