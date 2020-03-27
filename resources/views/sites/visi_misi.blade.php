@extends('layouts.mfrontend')

@section('title')
	{{ $sk->judul }}
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/visi-misi.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 fact">
					<div class="fact-text">
						<!-- <h2>Home > Visi Misi</h2> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fact section end-->

	<!-- Visi Misi Sekolah -->
	<section class="about-section spad pt-0 bawah">
		<div class="container">
			<div class="section-title text-center">
				<h3>MADRASAH TSANAWIYAH 10 TASIKMALAYA</h3>
				<p>{{ $sk->judul }}</p>
			</div>
			<div class="row">
				<div class="col-lg-6 about-text">
					<!-- <h5>Visi Misi</h5> -->
					<p>
						{!! $sk->deskripsi !!}
					</p>
					<div class="blog-meta">
						Dipublish Pada : {{ $sk->created_at->format('D, d M Y') }} - Oleh {{ $sk->user->name }}
					</div>
				</div>
				<div class="col-lg-6 pt-5 pt-lg-0">
					<img src="{{ asset('images/data sekolah/'.$sk->image) }}" alt="image">
				</div>
			</div>
		</div>
	</section>
	<!-- /Visi Misi Sekolah -->
@stop

