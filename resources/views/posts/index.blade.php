@extends('layouts.master')

@section('title')
	Publish | MTSN 10 TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Publish MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Publish</a></li>
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Publish Baru</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
											<form class="" method="GET" action="/Publish/MTSN-10-TSM">
												<div class="input-group">
													<input type="text" value="" class="form-control" placeholder="Cari Publish..." name="qPublish">
													<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
												</div>
											</form>
										</div>
									</div><br>
									<div class="row">
										<div class="table-responsive">
											<div class="col-md-12">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>No.</th>
															<th>Title</th>
															<th>Kategori</th>
															<th>User</th>
															<th>Tanggal Publish</th>
															<th>Opsi</th>
														</tr>
													</thead>
													<tbody>
														@forelse($posts as $post)
														<tr>
															<td>{{ $loop->iteration }}</td>
															<td>{{ $post->title }}</td>
															<td>{{ $post->kategori }}</td>
															<td>{{ $post->user->name }}</td>
															<td>{{ $post->created_at->format('D, d M y') }}
															</td>
															<td>
																<a target="_blank" href="{{ route('site.single.post', $post->slug) }}" class="btn btn-sm btn-info"><i class="lnr lnr-location"></i></a>
																<a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
																<a href="#" class="btn btn-sm btn-danger delete" ps-id="{{ $post->id }}"><i class="lnr lnr-trash"></i></a>
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
										{!! $posts->links() !!}
									</div>	

								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
								      	@csrf
						       			<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
							       			<label for="title">Title</label>
							       			<input type="text" name="title" placeholder="Masukkan Title" class="form-control" id="title" value="{{ old('title') }}">

							       			@if($errors->has('title'))
									  			<span class="help-block">{{$errors->first('title')}}</span>
									  		@endif
						       			</div>

						       			<div class="form-group {{$errors->has('kategori') ? ' has-error' : ''}}">
							       			<label for="kategori">Pilih Kategori</label>
										    <select class="form-control" id="kategori" name="kategori">
										      <option value="Berita" {{(old('kategori') == 'Berita') ? ' selected' : ''}}>Berita</option>
										      <option value="Pengumuman" {{(old('kategori') == 'Pengumuman') ? ' selected' : ''}}>Pengumuman</option>
										    </select>

							       			@if($errors->has('kategori'))
									  			<span class="help-block">{{$errors->first('kategori')}}</span>
									  		@endif
						       			</div>

						       			<div class="form-group {{$errors->has('content') ? ' has-error' : ''}}">
						       				<label for="content">Content</label>
						       				<textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>

						       				@if($errors->has('content'))
									  			<span class="help-block">{{$errors->first('content')}}</span>
									  		@endif
						       			</div>

										 <div class="input-group {{$errors->has('thumbnail') ? ' has-error' : ''}}">
										   <label for="thumbnail">Gambar</label>
										   <input id="thumbnail" class="form-control" type="file" name="thumbnail">

										   @if($errors->has('thumbnail'))
									  			<span class="help-block">{{$errors->first('thumbnail')}}</span>
									  		@endif
										 </div>

										 <div class="form-group">
											 <img id="holder" style="margin-top:15px;max-height:100px;">
										 </div>

										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-primary">Tambah Publish</button>
										</div>
									</div>
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
		//Delete
		$('.delete').click(function(){
			var ps_id = $(this).attr('ps-id');
			swal({
				  title: "Hapus!",
				  text: "Publish Dengan ID "+ps_id+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/publish-destroy/"+ps_id+"/MTSN-10-TSM";
				  }
				});
		});

		// Ckeditor
	    ClassicEditor
	        .create( document.querySelector( '#content' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop