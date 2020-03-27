@extends('layouts.mfrontend')

@section('title')
	{{ $pres->judul }}
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/prestasi.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 fact">
					<div class="fact-text">
						<!-- <h2>Home > Berita Dan Pengumuman</h2> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fact section end-->

	<section class="blog-page-section spad pt-0 bawah">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-item post-details">
						<img src="{{ asset('images/prestasi/'.$pres->getImage()) }}" class="post-thumb-full" alt="image">
						<div class="post-content">
							<h3>{{ $pres->judul }}</h3>
							<div class="post-meta">
									Dipublish Pada : {{ $pres->created_at->format('D, d M Y') }} - Oleh {{ $pres->user->name }}
							</div>
							<p>{!! $pres->deskripsi !!}</p>
						</div>
						<div class="post-author">
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
						<form class="search-widget" method="GET" action="/prestasi">
							<input type="text" placeholder="Cari Prestasi..." name="cPrestasi">
							<button><i class="ti-search"></i></button>
						</form>
					</div>
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Prestasi Terbaru</h5>
						<div class="recent-post-widget">
							@foreach($prestasi as $pi)
							<!-- recent post -->
							<div class="rp-item">
								<div class="rp-thumb set-bg" data-setbg="{{ asset('images/prestasi/'.$pi->getImage()) }}" style="background-image: url('{{ asset('images/prestasi/'.$pi->image) }}')"></div>
								<div class="rp-content">
									<a href="{{ route('prestasi.single.post', $pi->slug) }}"><h6>{{ $pi->judul }}</h6></a>
									<p>Publish : {{ $pi->created_at->format('D, d M Y') }}</p>
								</div>
							</div>
							@endforeach
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop