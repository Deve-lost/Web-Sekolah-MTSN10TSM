@extends('layouts.master')

@section('title')
	Buku Induk | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- TABLE STRIPED -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Buku Induk</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3">
									<form class="" method="GET" action="/data-buku-induk/MTSN-10-TSM">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Cari Buku Induk..." name="qBi">
											<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
										</div>
									</form>
								</div>
							</div><br>
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nis</th>
											<th>Nama Lengkap</th>
											<th>Jenis Kelamin</th>
											<th>Tempat Tanggal Lahir</th>
											<th>Alamat</th>
											@if(auth()->user()->role == 'Admin')
											<th>Opsi</th>
											@endif
										</tr>
									</thead>
									<tbody>
										@forelse($bi as $r)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td><a href="/buku-induk/{{$r->id}}/MTSN-10-TSM">{{ $r->nis }}</a></td>
											<td><a href="/buku-induk/{{$r->id}}/MTSN-10-TSM">{{ $r->nama_lengkap }}</a></td>
											<td>{{ $r->jenis_kelamin }}</td>
											<td>{{ $r->ttl }}</td>
											<td>{{ $r->alamat }}</td>
											@if(auth()->user()->role == 'Admin')
											<td>
												<a href="/edit-buku-induk/{{$r->id}}/MTSN-10-TSM" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-sm delete" bi-nm="{{$r->nama_lengkap}}" bi-id="{{$r->id}}"><i class="lnr lnr-trash"></i></a>
											</td>
											@endif
										</tr>
										@empty
										<tr>
											<td colspan="7"><b><i>Tidak Ada Data</i></b></td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							{!! $bi->links() !!}
						</div>
					</div>
					<!-- END TABLE STRIPED -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')
	<script type="text/javascript">
		$('.delete').click(function(){
			var bi_id = $(this).attr('bi-id');
			var bi_nm = $(this).attr('bi-nm');
			swal({
				  title: "Hapus!",
				  text: "Data Buku Induk "+ bi_nm +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-buku-induk/"+bi_id+"/MTSN-10-TSM";
				  }
				});
		});
	</script>
@stop