@extends('layouts.mfrontend')

@section('title')
	MTSN 10 TASIKMALAYA
@stop

@section('content')

<!-- Hero section -->
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		@forelse($hms as $hm)
		<div class="hs-item set-bg" data-setbg="{{ asset('images/hero slide/'.$hm->image()) }}" style="background-image: url('{{ asset('images/hero slide/'.$hm->image()) }}')">
			<div class="hs-text">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="hs-subtitle">MTSN 10 Tasikmalaya</div>
							<h2 class="hs-title">{{ $hm->title }}</h2>
							<p class="hs-des">{{ $hm->quotes }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@empty
		<div class="hs-item set-bg" data-setbg="{{asset('images/no-thumbnail.png')}}">
		</div>
		@endforelse
	</div>
</section>
<!-- Hero section end -->

<!-- Services section -->
	<section class="newsletter-section spad">
		<div class="container services">
			<div class="section-title text-center">
				<h3>SAMBUTAN KEPALA SEKOLAH</h3>
				<p>MTSN 10 TASIKMALAYA</p>
			</div>
			<div class="row">
				<div class="col-sm-3 offset-sm-1">
					<div class="service-icon">
						<img src="{{ asset('images/data sekolah/'.$kepsek->image) }}" alt="Sambutan Kepala Sekolah">
					</div>
				</div>
				
				<div class="col-sm-8">
					<div class="service-content">
						<h4>{{ $kepsek->nm_kepsek }}</h4>
						<p>
							{!! $kepsek->deskripsi !!}
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->

	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>BERITA DAN PENGUMUMAN</h3>
				<p>MTSN 1O TASIKMALAYA</p>
			</div>
			<div class="row">
				@forelse($posts as $post)
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" style="background-image: url('{{  $post->thumbnail }}')" data-setbg="{{ asset('images/post/'.$post->thumbnail) }}"></div>
						<div class="blog-content">
							<a href="{{ route('site.single.post', $post->slug) }}">			<h4>{{ $post->title }}</h4></a>
							<div class="blog-meta">
								<span class="navbar-text">
								Dipublish Pada : {{ $post->created_at->format('D, d M Y') }} - Oleh {{ $post->user->name }} | Kategori : {{ $post->kategori }}
								</span>
							</div>
							<p>{!! str_limit($post->content, '100', '...') !!}</p>
						</div>
					</div>
				</div>
				@empty
				<div class="col-xl-6">
					<b><i>Tidak Ada Data</i></b>
				</div>
				@endforelse
			</div>
		</div>
	</section>
	<!-- Blog section -->

	<!-- Prestasi -->
	<section class="newsletter-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>PRESTASI</h3>
				<p>MTSN 10 TASIKMALAYA</p>
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
		</div>
	</section>
	<!-- Prestasi end-->
	
	<!-- Testimonial section  -->
	<section class="testimonial-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>TESTIMONI ALUMNI</h3>
				<p>MTSN 1O TASIKMALAYA</p>
			</div>
			<div class="testimonial-slider owl-carousel">
				@forelse($testimoni as $ts)
				<div class="ts-item">
					<div class="row">
						<div class="col-md-3">
							<div class="ts-author-pic set-bg" data-setbg="{{ asset('images/testimoni/'.$ts->avatar()) }}"></div>
						</div>
						<div class="col-md-9 ts-text">
							<div class="col-md-9 ts-text">
								<p>{!! $ts->caption !!}</p>
								<h5>{{ $ts->nama }}</h5>
								<span>{{ $ts->status }} | Lulusan - {{ $ts->lulusan }}</span>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="ts-item">
					<div class="row">
						<div class="col-md-3">
							<div class="ts-author-pic set-bg" data-setbg="{{ asset('images/default.png') }}"></div>
						</div>
						<div class="col-md-9 ts-text">
							<div class="col-md-9 ts-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<h5>Lorem</h5>
								<span>lorem</span>
							</div>
						</div>
					</div>
				</div>
				@endforelse
			</div>
		</div>
	</section>
	<!-- Testimonial section end -->
@stop