@extends('layouts.master')

@section('title')
	Gallery | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Gallery MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Gallery</a></li>
									@if(auth()->user()->role == 'Admin')
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Gallery</a></li>
									@endif
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="/Gallery/MTSN-10-TSM">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Gallery..." name="qGallery">
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
														<th>Caption</th>
														<th>User</th>
														<th>Tanggal Publish</th>
														<th>Opsi</th>
													</tr>
												</thead>
												<tbody>
												@forelse($gallery as $gr)
													<tr>
														<td>{{ $loop->iteration }}</td>
														<td>{{ $gr->caption }}</td>
														<td>{{ $gr->user->name }}</td>
														<td>{{ $gr->created_at->format('D, d M y') }}</td>
														<td>
															<a target="_blank" href="{{ route('gallery.single.post', $gr->slug) }}" class="btn btn-sm btn-info"><i class="lnr lnr-location"></i></a>
															<a href="/edit-gallery/{{$gr->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
												          	<a href="#" class="btn btn-sm btn-danger delete" gr-id="{{$gr->id}}"><i class="lnr lnr-trash"></i></a>
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
									{!! $gallery->links() !!}	
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="/store-gallery/MTSN-10-TSM" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('caption') ? ' has-error' : ''}}">
											<label for="caption">Caption</label>
											<input type="text" name="caption" placeholder="Masukkan Caption" id="caption" class="form-control" value="{{ old('caption') }}">

											@if($errors->has('caption'))
									  			<span class="help-block">{{$errors->first('caption')}}</span>
									  		@endif
										</div>

						       			<div class="input-group {{$errors->has('image') ? ' has-error' : ''}}">
										   <label for="image">Gambar</label>
										   <input id="image" class="form-control" type="file" name="image" value="{{ old('image') }}">

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
			var gr_id = $(this).attr('gr-id');
			swal({
				  title: "Hapus!",
				  text: "Gallery Dengan ID "+gr_id+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-gallery/"+gr_id+"/MTSN-10-TSM";
				  }
				});
		});

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop