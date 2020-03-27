@extends('layouts.master')

@section('title')
	Buku Induk - {{ $bi->nama_lengkap }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main" style="height: 510px;">
								<img src="{{asset('images/siswa/'.$bi->avatar()) }}" class="img-circle" alt="Avatar" width="120" height="120" style="margin-top: 120px;">
								<h3 class="name">{{ $bi->nama_lengkap }}</h3>
								<span class="online-status status-available">Siswa</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<h4 class="heading">Data Buku Induk - {{ $bi->nama_lengkap }}</h4>
						<!-- <div class="row">
							<div class="col-md-6"> -->
								<ul class="list-unstyled list-justify">
									<li>No Induk Siswa <span> {{ $bi->nis }}<span></li>
									<li>Nama Lengkap <span> {{ $bi->nama_lengkap }}<span></li>
									<li>Tempat Tanggal Lahir <span> {{ $bi->ttl }}</span></li>
									<li>Jenis Kelamin <span> {{ $bi->jenis_kelamin }}</span></li>
									<li>Agama <span> {{ $bi->agama }}</span></li>
									<li>Alamat <span> {{ $bi->alamat }}</span></li>
									<li>Anak Ke- <span> {{ $bi->anak_ke }}</span></li>
									<li>Nama Ayah <span> {{ $bi->nama_ayah }}</span></li>
									<li>Pendidikan Ayah <span> {{ $bi->pendidikan_ayah }}</span></li>
									<li>Pekerjaan Ayah <span> {{ $bi->pekerjaan_ayah }}</span></li>
									<li>Penghasilan Ayah <span> {{ $bi->penghasilan_ayah }}</span></li>
									<li>Nama Ibu <span> {{ $bi->nama_ibu }}</span></li>
									<li>Pendidikan ibu <span> {{ $bi->pendidikan_ibu }}</span></li>
									<li>Pekerjaan ibu <span> {{ $bi->pekerjaan_ibu }}</span></li>
									<li>Penghasilan ibu <span> {{ $bi->penghasilan_ibu }}</span></li>
									<li>Alamat Orang Tua <span> {{ $bi->alamat_ortu }}</span></li>
								</ul>
							<!-- </div>
						</div> -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop