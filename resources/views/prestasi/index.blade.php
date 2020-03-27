@extends('layouts.master')

@section('title')
	Prestasi | MTSN 10 TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Prestasi MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Prestasi</a></li>
									@if(auth()->user()->role == 'Admin')
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Prestasi</a></li>
									@endif
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="/Prestasi/MTSN-10-TSM">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Prestasi..." name="qPrestasi">
													<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
												</div>
											</form>
										</div>
									</div><br>
									<div class="table-reponsive">
										<table class="table table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Judul</th>
											<th>User</th>
											<th>Created At</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@forelse($prestasi as $pres)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $pres->judul }}</td>
											<td>{{ $pres->user->name }}</td>
											<td>{{ $pres->created_at->format('D, d M y') }}</td>
											<td>
												<a target="_blank" href="{{ route('prestasi.single.post', $pres->slug) }}" class="btn btn-sm btn-info"><i class="lnr lnr-location"></i></a>
												@if(auth()->user()->role == 'Admin')
												<a href="/edit-prestasi/{{$pres->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
										        <a href="#" class="btn btn-sm btn-danger delete" pres-id="{{$pres->id}}"><i class="lnr lnr-trash"></i></a>
										        @endif
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
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="/store-prestasi/MTSN-10-TSM" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
											<label for="judul">Prestasi</label>
											<input type="text" name="judul" placeholder="Masukkan Prestasi" id="judul" class="form-control" value="{{ old('judul') }}">

											@if($errors->has('judul'))	
												<span class="help-block">{{$errors->first('judul')}}</span>
									  		@endif
										</div>

										 <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
						       				<label for="deskripsi">Deskripsi</label>
						       				<textarea id="deskripsi" name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>

						       				@if($errors->has('deskripsi'))
									  			<span class="help-block">{{$errors->first('deskripsi')}}</span>
									  		@endif
						       			</div>

						       			<div class="input-group {{$errors->has('image') ? ' has-error' : ''}}">
						       			   <label for="image">Gambar</label>
										   <input id="image" class="form-control" type="file" name="image">

										   @if($errors->has('image'))
									  			<span class="help-block">{{$errors->first('image')}}</span>
									  		@endif
										 </div><br>

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
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
		$('.delete').click(function(){
			var pres_id = $(this).attr('pres-id');
			swal({
				  title: "Hapus!",
				  text: "Prestasi Dengan ID "+pres_id+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-prestasi/"+pres_id+"/MTSN-10-TSM";
				  }
				});
		});

		// Ckeditor
	    ClassicEditor
	        .create( document.querySelector( '#deskripsi' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop