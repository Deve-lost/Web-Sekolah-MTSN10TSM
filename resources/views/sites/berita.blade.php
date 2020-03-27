@extends('layouts.mfrontend')

@section('title')
	Berita Dan Pengumuman
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
	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>MTSN 10 TASIKMALAYA</h3>
				<p>Berita Dan Pengumuman Terbaru</p>
			</div>
			<div class="row">
				@forelse($posts as $post)
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="{{ asset('images/post/'.$post->thumbnail) }}" style="background-image: url('{{ asset('images/post/'.$post->thumbnail) }}')"></div>
						<div class="blog-content">
							<a href="{{ route('site.single.post', $post->slug) }}"><h4 style="color: #f6783a;">{{ $post->title }}</h4></a>
							<div class="blog-meta">
								<span class="navbar-text">
								Dipublish Pada : {{ $post->created_at->format('D, d M Y') }} - Oleh {{ $post->user->name }} | Kategori : {{ $post->kategori }}
								</span>
							</div>
							<p>
								{!! str_limit($post->content, 100, '...') !!}
							</p>
						</div>
					</div>
				</div>
				@empty
				<div class="col-xl-6"><b><i>Tidak Ada Berita Dan Pengumuman Terbaru</i></b></div>
				@endforelse
			</div>
			<div class="row">
				<div class="col-sm-12">
					{{ $posts->links() }}
				</div>
			</div>
		</div>
	</section>
	<!-- Berita section -->
@stop