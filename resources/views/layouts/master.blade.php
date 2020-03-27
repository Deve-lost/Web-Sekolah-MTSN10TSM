<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- Toastr -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/toastr/toastr.min.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" sizes="76x76" href="{{asset('admin/assets/img/icon.jpg')}}">
	<link rel="icon" type="image/jpg" sizes="96x96" href="{{asset('admin/assets/img/icon.jpg')}}">

	<!-- Ckeditor -->
	<style type="text/css">
		.ck-editor__editable {
			min-height: 300px;
		}
	</style>
	
	@yield('header')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.includes._navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layouts.includes._sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Copyright © <script>document.write(new Date().getFullYear());</script>. Dikembangkan Oleh <a href="http://mecodeweb.com/" target="_blank"> MECODE WEB</a>
				</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/toastr/toastr.js')}}"></script>
	<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{asset('js/ckeditor.js')}}"></script>

	<!-- Alert -->
	<script>
		@if(Session::has('sukses'))
			toastr.success("{{Session::get('sukses')}}")
		@endif
	</script>
	<script>
		@if(Session::has('error'))
			toastr.error("{{Session::get('error')}}")
		@endif
	</script>

	<!-- Logout -->
	<script type="text/javascript">
		$('.Logout').click(function(){
			swal({
				  title: "Yakin!",
				  text: "Untuk Keluar?",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/Logout-MTSN-10-TSM";
				  }
				});
		});
	</script>
	<!-- /logout -->

	@yield('footer')
</body>

</html>
