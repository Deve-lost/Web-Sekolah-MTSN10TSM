@extends('layouts.master')

@section('title')
	Testimoni | MTSN 10 TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Testimoni MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Testimoni</a></li>
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Testimoni</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="{{ route('testimoni') }}">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Testimoni..." name="qTestimoni">
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
														<th>Nama Alumni</th>
														<th>Status</th>
														<th>Lulusan</th>
														<th>Opsi</th>
													</thead>
													<tbody>
														@forelse($testimoni as $r)
														<tr>
															<td>{{ $loop->iteration }}</td>
															<td>{{ $r->nama }}</td>
															<td>{{ $r->status }}</td>
															<td>{{ $r->lulusan }}</td>
															<td>
																<a href="/edit-testimoni/{{$r->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
																<a href="#" class="btn btn-sm btn-danger delete" ts-nm="{{$r->nama}}" ts-id="{{$r->id}}"><i class="lnr lnr-trash"></i></a>
															</td>
														</tr>
														@empty
														<tr>
															<td colspan="7"><b><i>Tidak Ada Data</i></b></td>
														</tr>
														@endforelse
													</tbody>
												</table>
											</div>
											{!! $testimoni->links() !!}
										</div>
									</div>	
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="/store-testimoni/MTSN-10-TSM" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
											<label for="nama">Nama Alumni</label>
											<input type="text" name="nama" placeholder="Masukkan Nama" id="nama" class="form-control" value="{{ old('nama') }}">

											@if($errors->has('nama'))	
												<span class="help-block">{{$errors->first('nama')}}</span>
									  		@endif
										</div>

										<div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
											<label for="status">Status</label>
											<input type="text" name="status" placeholder="Masukkan Status" id="status" class="form-control" value="{{ old('status') }}">

											@if($errors->has('status'))	
												<span class="help-block">{{$errors->first('status')}}</span>
									  		@endif
										</div>

										<div class="form-group {{$errors->has('lulusan') ? ' has-error' : ''}}">
											<label for="lulusan">Lulusan Tahun</label>
											<input type="text" name="lulusan" placeholder="Masukkan Lulusan" id="lulusan" class="form-control" value="{{ old('lulusan') }}">

											@if($errors->has('lulusan'))	
												<span class="help-block">{{$errors->first('lulusan')}}</span>
									  		@endif
										</div>

										<div class="form-group {{$errors->has('caption') ? ' has-error' : ''}}">
						       				<label for="caption">Caption</label>
						       				<textarea id="caption" name="caption" class="form-control">{{ old('caption') }}</textarea>

						       				@if($errors->has('caption'))
									  			<span class="help-block">{{$errors->first('caption')}}</span>
									  		@endif
						       			</div>

										<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
										   <label for="avatar">Avatar</label>
										   <input id="avatar" class="form-control" type="file" name="avatar">

										   @if($errors->has('avatar'))
									  			<span class="help-block">{{$errors->first('avatar')}}</span>
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
			var ts_id = $(this).attr('ts-id');
			var ts_nm = $(this).attr('ts-nm');
			swal({
				  title: "Hapus!",
				  text: "Testimoni "+ ts_nm +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-testimoni/"+ts_id+"/MTSN-10-TSM";
				  }
				});
		});

		// Ckeditor
	    ClassicEditor
	        .create( document.querySelector( '#caption' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop