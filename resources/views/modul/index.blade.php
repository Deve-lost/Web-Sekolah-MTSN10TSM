@extends('layouts.master')

@section('title')
	Modul Pelajaran | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Modul Pelajaran MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Modul</a></li>
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false"> Tambah Modul Pelajaran</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="/modul-pelajaran/MTSN-10-TSM">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Modul Pelajaran..." name="qModul">
													<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
												</div>
											</form>
										</div>
									</div><br>
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-striped">
													<thead>
														<th>No.</th>
														<th>Nama Modul</th>
														<th>User</th>
														<th>Tanggal Upload</th>
														<th>Download</th>
														<th>Opsi</th>
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
															<td>
																<a href="/edit-modul/{{$md->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
																<a href="#" class="btn btn-sm btn-danger delete" md-jd="{{$md->judul}}"  md-id="{{$md->id}}"><i class="lnr lnr-trash"></i></a>
															</td>
														</tr>
														@empty
														<tr>
															<td colspan="6"><b><i>Tidak Ada Data</i></b></td>
														</tr>
														@endforelse
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="/store-modul/MTSN-10-TSM" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
											<label for="judul">Nama Modul</label>
											<input type="text" name="judul" placeholder="Masukkan Nama Modul" id="judul" class="form-control" value="{{ old('judul') }}">

											@if($errors->has('judul'))
									  			<span class="help-block">{{$errors->first('judul')}}</span>
									  		@endif
										</div>

										<div class="form-group {{$errors->has('data') ? ' has-error' : ''}}">
							       			<label for="data">Modul</label>
							       			<input type="file" name="data" class="form-control" id="data">

							       			@if($errors->has('data'))
									  			<span class="help-block">{{$errors->first('data')}}</span>
									  		@endif
						       			</div>

						       			<button type="submit" class="btn btn-sm btn-primary">Tambahkan</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')
	<script type="text/javascript">
		$('.delete').click(function(){
			var md_jd = $(this).attr('md-jd');
			var md_id = $(this).attr('md-id');
			swal({
				  title: "Hapus!",
				  text: "Modul "+md_jd+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-modul/"+md_id+"/MTSN-10-TSM";
				  }
				});
		});
	</script>
@stop