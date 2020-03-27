@extends('layouts.master')

@section('title')
	Profile Sekolah | MTSN 10 TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Profile Sekolah MTSN 10 TSM</h3>
						</div>
						<div class="panel-body">
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Profile Sekolah</a></li>
									<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Tambah Profile Sekolah</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-bottom-left1">
									@forelse($profiles as $prof)
									<div class="row">
									  <div class="col-md-12">
									    <div class="thumbnail">
									        <img src="{{ $prof->image }}" alt="Lights" style="width:100%">
									        <div class="caption">
									          <p><h4>{{ $prof->judul }}</h4></p>
									          <br>
									          <p>
									          	{!! $prof->deskripsi !!}
									          </p>
									          <br>
									          Di Publish Pada : {{ $prof->created_at->format('D, d M y') }} - oleh {{ $prof->user->name }}
									          <br><br>
									          <p>
									          	<a href="#" class="btn btn-sm btn-primary"><i class="lnr lnr-location"></i></a>
									          	<a href="#" class="btn btn-sm btn-warning"><i class="lnr lnr-pencil"></i></a>
									          	<a href="#" class="btn btn-sm btn-danger"><i class="lnr lnr-trash"></i></a>
									          </p>
									        </div>
									    </div>
									  </div>
									</div>
									@empty
									<div class="row">
										<p><H4>Tidak Ada Data</H4></p>
									</div>
									@endforelse
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form method="POST" action="{{ route('profsekolah.store') }}" enctype="multipart/form-data">
								      	@csrf
						       			<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
							       			<label for="judul">Judul</label>
							       			<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" id="judul" value="{{ old('judul') }}">

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
										   <span class="input-group-btn">
										     <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
										       <i class="fa fa-picture-o"></i> Choose
										     </a>
										   </span>
										   <input id="image" class="form-control" type="text" name="image">

										   @if($errors->has('image'))
									  			<span class="help-block">{{$errors->first('image')}}</span>
									  		@endif
										 </div>

										 <div class="form-group">
											 <img id="holder" style="margin-top:15px;max-height:100px;">
										 </div>

										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-primary">Tambah Profile Sekolah</button>
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