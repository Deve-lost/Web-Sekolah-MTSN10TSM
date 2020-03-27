@extends('layouts.mfrontend')

@section('title')
	{{ $post->title }}
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/berita.jpg')}}">
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

	<!-- Berita section -->
	<section class="blog-page-section spad pt-0 bawah">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-item post-details">
						<img src="{{ asset('images/post/'.$post->thumbnail) }}" class="post-thumb-full" alt="image">
						<div class="post-content">
							<h3>{{ $post->title }}</h3>
							<div class="post-meta">
									Dipublish Pada : {{ $post->created_at->format('D, d M Y') }} - Oleh {{ $post->user->name }}
							</div>
							<p>{!! $post->content !!}</p>
							<div class="tag"> Kategori : {{ $post->kategori }}</div>
						</div>
						<div class="post-author">
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
						<form class="search-widget" method="GET" action="/berita-dan-pengumuman">
							<input type="text" placeholder="Cari Berita..." name="cBerita">
							<button><i class="ti-search"></i></button>
						</form>
					</div>
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Berita Dan Pengumuman Terbaru</h5>
						<div class="recent-post-widget">
							@foreach($berita as $ber)
							<!-- recent post -->
							<div class="rp-item">
								<div class="rp-thumb set-bg" data-setbg="{{ asset('images/post/'.$ber->thumbnail) }}" style="background-image: url('{{ asset('images/post/'.$ber->thumbnail) }}')"></div>
								<div class="rp-content">
									<a href="{{ route('site.single.post', $ber->slug) }}"><h6>{{ $ber->title }}</h6></a>
									<p>Publish : {{ $ber->created_at->format('D, d M Y') }}</p>
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