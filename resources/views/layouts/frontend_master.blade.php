<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->

    <title>Yamifood Restaurant - {{ $title }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('frontend_assets') }}/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('frontend_assets') }}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/custom.css">

		<!-- Pickadate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/classic.css">
		<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/classic.date.css">
		<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/classic.time.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="{{ asset('frontend_assets') }}/images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item @yield('home')"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
						<li class="nav-item @yield('menu')"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
						<li class="nav-item @yield('about')"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
						<li class="nav-item dropdown @yield('pages')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item @yield('reservation')" href="{{ url('/reservation') }}">Reservation</a>
								<a class="dropdown-item @yield('stuff')" href="{{ url('/stuff') }}">Stuff</a>
								<a class="dropdown-item @yield('gallery')" href="{{ url('/gallery') }}">Gallery</a>
							</div>
						</li>
						<li class="nav-item @yield('blog')"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
						<li class="nav-item @yield('contact')"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

@yield('frontend_content')

<!-- Start Contact info -->
<div class="contact-imfo-box">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <i class="fa fa-volume-control-phone"></i>
        <div class="overflow-hidden">
          <h4>Phone</h4>
          <p class="lead">
            +01 123-456-4590
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <i class="fa fa-envelope"></i>
        <div class="overflow-hidden">
          <h4>Email</h4>
          <p class="lead">
            yourmail@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <i class="fa fa-map-marker"></i>
        <div class="overflow-hidden">
          <h4>Location</h4>
          <p class="lead">
            800, Lorem Street, US
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Contact info -->

<!-- Start Footer -->
<footer class="footer-area bg-f">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <h3>About Us</h3>
        <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3>Opening hours</h3>
        <p><span class="text-color">Monday: </span>Closed</p>
        <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
        <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
        <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3>Contact information</h3>
        <p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
        <p class="lead"><a href="#">+01 2000 800 9999</a></p>
        <p><a href="#"> info@admin.com</a></p>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3>Subscribe</h3>
        <div class="subscribe_form">
					@forelse ($subscription_infos as $info)
							<a href="{{ url('subcription/delete') }}" type="submit" class="btn btn-secondary">UNSUBSCRIBE</a>
							<p style="color:#ffffff">{{ $info->user_email }}</p>
					@empty
						<form class="subscribe_form" action="{{ url('add/subcription/post') }}" method="post">
							@csrf
							<input name="user_email" id="subs-email" class="form_input" placeholder="Email Address...">
							@error ('user_email')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					@endforelse
        </div>
        <ul class="list-inline f-social">
          <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Yamifood Restaurant</a> Design By :
        <a href="https://html.design/">html design</a></p>
        </div>
      </div>
    </div>
  </div>

</footer>
<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="{{ asset('frontend_assets') }}/js/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/popper.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
	  <!-- ALL PLUGINS -->
	<script src="{{ asset('frontend_assets') }}/js/jquery.superslides.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/images-loded.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/isotope.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/baguetteBox.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/picker.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/picker.date.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/picker.time.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/legacy.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/form-validator.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/contact-form-script.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/custom.js"></script>

</body>
</html>
