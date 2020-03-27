@extends('layouts.mfrontend')

@section('title')
	Modul Pelajaran | MTSN 10 Tasikmalaya
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/modul-pelajaran.jpg')}}">
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
	<section class="section spad pt-0 bawah">
		<div class="container">
			<div class="section-title text-center">
				<h3>MADRASAH TSANAWIYAH 10 TASIKMALAYA</h3>
				<p>Modul Pelajaran MTSN 10 Tasikmalaya</p>
			</div>
			<div class="row">
				<div class="col-lg-12 about-text">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Modul</th>
									<th>User</th>
									<th>Upload</th>
									<th>Download</th>
								</tr>
							</thead>
							<tbody>
								@forelse($modul as $md)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $md->judul }}</td>
									<td>{{ $md->user->name }}</td>
									<td>{{ $md->created_at->format('D, d M y') }}</td>
									<td>
										<a href="/files/{{$md->data}}" class="btn btn-sm btn-info" download="{{$md->data}}">
											<i class="lnr lnr-download"></i> Download Modul
										</a>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="5"><b><i>Tidak Ada Data</i></b></td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Visi Misi Sekolah -->
@stop

