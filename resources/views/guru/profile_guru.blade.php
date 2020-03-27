@extends('layouts.master')

@section('title')
	Profile Guru - {{ $guru->nama_lengkap }}
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
							<div class="profile-main">
								<img src="{{$guru->avatar()}}" class="img-circle" alt="Avatar" width="120" height="120">
								<h3 class="name">{{ $guru->nama_lengkap }}</h3>
								<span class="online-status status-available">Guru</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-12 stat-item">
										{{$guru->mapel->count()}} <span>Jumlah Mapel Yang Diajar</span>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Data Diri</h4>
								<ul class="list-unstyled list-justify">
									<li>No Induk Guru <span> {{ $guru->nig }}</span></li>
									<li>Nama Lengkap <span> {{ $guru->nama_lengkap }}</span></li>
									<li>TTL <span> {{ $guru->ttl }}</span></li>
									<li>Jenis Kelamin<span> {{ $guru->jenis_kelamin }}</span></li>
									<li>Agama<span> {{ $guru->agama }}</span></li>
									<li>Telepon<span> {{ $guru->telepon }}</span></li>
									<li>Jabatan<span> {{ $guru->jabatan }}</span></li>
									<li>Alamat<span> {{ $guru->alamat }}</span></li>
								</ul>
							</div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right" style="min-height: 630px;">
						<h4 class="heading">Mata Pelajaran Yang Diajar Oleh - {{ $guru->nama_lengkap }}</h4>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode</th>
										<th>Nama</th>
										<th>Semester</th>
									</tr>
								</thead>
								<tbody>
									@forelse($guru->mapel as $mp)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $mp->kode }}</td>
										<td>{{ $mp->nama }}</td>
										<td>{{ $mp->semester }}</td>
									</tr>
									@empty
									<tr>
										<td colspan="4"><b><i>Tidak Ada Data</i></b></td>
									</tr>	
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop

