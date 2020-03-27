<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<!-- <meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
	<!-- ICONS -->
	<link rel="icon" sizes="76x76" href="{{asset('admin/assets/img/icon.jpg')}}">
	<link rel="icon" type="image/jpg" sizes="96x96" href="{{asset('admin/assets/img/icon.jpg')}}">

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Navbar -->
	@include('layouts.includes._navfront')
	<!-- /Navbar -->
	
	@yield('content')

	@include('layouts.includes._footer')

	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.countdown.js')}}"></script>
	<script src="{{asset('frontend/js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('frontend/js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>