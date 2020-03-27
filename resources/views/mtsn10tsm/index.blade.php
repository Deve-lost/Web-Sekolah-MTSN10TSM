@extends('layouts.master')

@section('title')
	Data Sekolah | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Sekolah MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Data Sekolah</a></li>
									@if(auth()->user()->role == 'Admin')
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Data Sekolah</a></li>
									@endif
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="{{ route('data.sekolah') }}">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Data Sekolah..." name="qSekolah">
													<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
												</div>
											</form>
										</div>
									</div><br>
									<div class="row">
										<div class="table-responsive">
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
												@forelse($sekolah as $ds)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $ds->judul }}</td>
													<td>{{ $ds->user->name }}</td>
													<td>{{ $ds->created_at->format('D, d M Y') }}</td>
													<td>
														<a href="{{ route('edit.ds', $ds->id) }}" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
														@if(auth()->user()->role == 'Developer')
														<a target="_blank" href="{{ route('sekolah.single.post', $ds->slug) }}" class="btn btn-sm btn-info"><i class="lnr lnr-location"></i></a>
														<a href="#" class="btn btn-sm btn-danger delete" ds-id="{{ $ds->id }}"><i class="lnr lnr-trash"></i></a>
														@endif
													</td>
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
									{!! $sekolah->links() !!}
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="{{ route('store.sekolah') }}" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
							       			<label for="judul">Judul</label>
							       			<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" id="judul" value="{{ old('judul') }}">

							       			@if($errors->has('judul'))
									  			<span class="help-block">{{$errors->first('judul')}}</span>
									  		@endif
						       			</div>

						       			<div class="form-group {{$errors->has('nm_kepsek') ? ' has-error' : ''}}">
							       			<label for="nm_kepsek">Nama Kepala Sekolah</label>
							       			<input type="text" name="nm_kepsek" placeholder="-- Kosongkan Jika Bukan Untuk Sambutan Kepala Sekolah --" class="form-control" id="nm_kepsek" value="{{ old('nm_kepsek') }}">

							       			@if($errors->has('nm_kepsek'))
									  			<span class="help-block">{{$errors->first('nm_kepsek')}}</span>
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
										 	<label for="image">Image</label>
										   <input id="image" class="form-control" type="file" name="image">

										   @if($errors->has('image'))
									  			<span class="help-block">{{$errors->first('image')}}</span>
									  		@endif
										 </div>

										 <div class="form-group">
											 <img id="holder" style="margin-top:15px;max-height:100px;">
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
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
		$('.delete').click(function(){
			var ds_id = $(this).attr('ds-id');
			swal({
				  title: "Hapus!",
				  text: "Data Sekolah Dengan ID "+ds_id+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/Destroy-Data-Sekolah/"+ds_id+"/MTSN-10-TSM";
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