@extends('layouts.mfrontend')

@section('title')
	Kontak | MTSN 10 Tasikmalaya
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/kontak.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 fact">
					<div class="fact-text">
						<!-- <h2>Home > Profile Sekolah</h2> -->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Fact section end-->

<section class="contact-page spad">
	<div class="container">
		<div class="map-section">
			<div class="contact-info-warp">
				<div class="contact-info">
					<h4>Alamat</h4>
					<p>Jl. Raya Singaparna Barat, Cikunten, Singaparna, Cikunten, Kec. Singaparna, Tasikmalaya, Jawa Barat 46416</p>
				</div>
				<div class="contact-info">
					<h4>No Telpon</h4>
					<p> (0265) 542362 </p>
				</div>
				<div class="contact-info">
					<h4>Email</h4>
					<p> mtsnsingaparnaku@gmail.com </p>
				</div>
			</div>
		</div>
{{-- 
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>Hubungi Kami Lewat Email</h3>
			</div>
			<form class="comment-form --contact" action="/kontak">
				<div class="row">
					<div class="col-lg-4">
						<input type="text" placeholder="Nama Lengkap">
					</div>
					<div class="col-lg-4">
						<input type="text" placeholder="Email">
					</div>
					<div class="col-lg-4">
						<input type="text" placeholder="Subject">
					</div>
					<div class="col-lg-12">
						<textarea placeholder="Pesan"></textarea>
						<div class="text-center">
							<button class="site-btn">Kirim</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
--}}
</section>
@stop