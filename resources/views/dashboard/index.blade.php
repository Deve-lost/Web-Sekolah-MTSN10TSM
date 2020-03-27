@extends('layouts.master')

@section('title')
	Dashboard | MTSN 10 TASIKMALAYA
@stop

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			{{--
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Dashboard</h3>
					<p class="panel-subtitle">MTSN 10 TASIKMALAYA</p>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-users"></i></span>
								<p>
									<span class="number">{{totalGuru()}}</span>
									<span class="title">Total Guru</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-users"></i></span>
								<p>
									<span class="number">{{totalSiswa()}}</span>
									<span class="title">Total Siswa</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-book"></i></span>
								<p>
									<span class="number">{{totalBi()}}</span>
									<span class="title">Total Buku Induk</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="lnr lnr-linearicons"></i></span>
								<p>
									<span class="number">{{totalUser()}}</span>
									<span class="title">Total Users</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END OVERVIEW -->
			--}}
			<div class="row">
				<div class="col-md-8">
					<!-- PANEL HEADLINE -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $sk->judul }}</h3>
							<p class="panel-subtitle"></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ asset('images/data sekolah/'.$sk->image) }}" alt="Profile Sekolah" class="image-fluid" style="width:100%">
								    </div>
								</div>
							</div>	
							<!-- <h4></h4> -->
							<p>{!! $sk->deskripsi !!}
							</p>
						</div>
					</div>
					<!-- END PANEL HEADLINE -->
				</div>
				<div class="col-md-4">
					<div class="panel panel-scrolling">
						<div class="panel-heading">
							<h3 class="panel-title">Sambutan Kepala Sekolah</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ asset('images/data sekolah/'.$kepsek->image) }}" alt="Sambutan Kepala Sekolah" class="image-fluid" style="width:100%">
								    </div>
								</div>
							</div>	
							<h3>{{ $kepsek->nm_kepsek }}</h3>
							<p>
								{!! $kepsek->deskripsi !!}
							</p>
						</div>
					</div>
				</div>
			</div>
			<h3 class="page-title">Berita Dan Pengumuman</h3>
			<div class="row">
				@forelse($posts as $post)
				<div class="col-md-4">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<p class="panel-subtitle">Kategori - {{ $post->kategori }}</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ asset('images/post/'.$post->thumbnail()) }}" alt="Profile Sekolah" class="image-fluid" style="width:100%">
								    </div>
								</div>
							</div>	
							<h3><a target="_blank" href="{{ route('site.single.post', $post->slug) }}">{{ $post->title }}</a></h3>
						</div>
					</div>
				</div>
				@empty
				<div class="col-md-4">
					<b><i>Tidak Ada Data</i></b>
				</div>
				@endforelse
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
@stop