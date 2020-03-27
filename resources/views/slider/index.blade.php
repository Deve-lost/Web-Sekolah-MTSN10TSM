@extends('layouts.master')

@section('title')
	Home Slide | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Home Slide</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Home Slide</a></li>
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Slide</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No.</th>
														<th>Title</th>
														<th>User</th>
														<th>Created At</th>
														<th>Opsi</th>
													</tr>
												</thead>
												<tbody>
													@forelse($hms as $hm)
													<tr>
														<td>{{ $loop->iteration }}</td>
														<td>{{ $hm->title }}</td>
														<td>{{ $hm->user->name }}</td>
														<td>{{ $hm->created_at->format('D, d M Y') }}</td>
														<td>
															<a href="{{ route('edit.slide', $hm->id) }}" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
															<a href="#" class="btn btn-sm btn-danger delete" hs-id="{{ $hm->id }}"><i class="lnr lnr-trash"></i></a>
														</td>
													</tr>
													@empty
													<tr>
														<td colspan="5">Tidak Ada Data</td>
													</tr>
													@endforelse
												</tbody>
											</table>
										</div>
										{!! $hms->links() !!}
									</div>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="{{ route('store.slide') }}" enctype="multipart/form-data">
										@csrf
										<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
							       			<label for="title">Title</label>
							       			<input type="text" name="title" placeholder="Masukkan Title" class="form-control" id="title" value="{{ old('title') }}">

							       			@if($errors->has('title'))
									  			<span class="help-block">{{$errors->first('title')}}</span>
									  		@endif
						       			</div>

						       			<div class="form-group {{$errors->has('quotes') ? ' has-error' : ''}}">
							       			<label for="quotes">Quotes</label>
							       			<input type="text" name="quotes" placeholder="-- Kosongkan Jika Tidak Diperlukan --" class="form-control" id="quotes" value="{{ old('quotes') }}">

							       			@if($errors->has('quotes'))
									  			<span class="help-block">{{$errors->first('quotes')}}</span>
									  		@endif
						       			</div>

										 <div class="input-group {{$errors->has('image') ? ' has-error' : ''}}">
							       			<label for="image">Image</label>
										   <input id="image" class="form-control" type="file" name="image" value="{{ old('image') }}">

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
			var hs_id = $(this).attr('hs-id');
			swal({
				  title: "Hapus!",
				  text: "Image Slide Dengan ID "+hs_id+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-slide/"+hs_id+"/MTSN-10-TSM";
				  }
				});
		});

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop