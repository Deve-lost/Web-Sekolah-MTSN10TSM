@extends('layouts.mfrontend')

@section('title')
	Prestasi | MTSN 10 Tasikmalaya
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/prestasi.jpg')}}">
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

	<!-- Prestasi -->
	<section class="newsletter-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>MTSN 10 TASIKMALAYA</h3>
				<p>Prestasi MTSN 10 Tasikmalaya</p>
			</div>
			<div class="row">
				<!-- Prestasi item -->
				@forelse($prestasi as $pres)
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="{{ asset('images/prestasi/'.$pres->getImage()) }}" alt="image">
					</div>
					<div class="course-info">
						<div class="date"><span class="navbar-text">Dipublish Pada : {{ $pres->created_at->format('D, d M Y') }} - Oleh {{ $pres->user->name }}</span></div>
						<a href="{{ route('prestasi.single.post', $pres->slug) }}"><h4>{{ $pres->judul }}</h4></a>
					</div>
				</div>
				@empty
				<div class="col-md-6">
					<b><i>Tidak Ada Data</i></b>
				</div>
				@endforelse
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! $prestasi->links() !!}
				</div>
			</div>
		</div>
	</section>
	<!-- Prestasi end-->
@stop