@extends('layouts.master')

@section('title')
	Edit Publish | {{ $ps->title }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Publish - {{ $ps->title }}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="{{ route('post.update', $ps->id) }}" enctype="multipart/form-data">
						      	@csrf
				       			<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
					       			<label for="title">Title</label>
					       			<input type="text" name="title" placeholder="Masukkan Title" class="form-control" id="title" value="{{ $ps->title }}">

					       			@if($errors->has('title'))
							  			<span class="help-block">{{$errors->first('title')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('kategori') ? ' has-error' : ''}}">
					       			<label for="kategori">Pilih Kategori</label>
								    <select class="form-control" id="kategori" name="kategori">
								      <option value="Berita" @if($ps->kategori == 'Berita') selected @endif>Berita</option>
								      <option value="Pengumuman" @if($ps->kategori == 'Pengumuman') selected @endif>Pengumuman</option>
								    </select>

					       			@if($errors->has('kategori'))
							  			<span class="help-block">{{$errors->first('kategori')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('content') ? ' has-error' : ''}}">
				       				<label for="content">Content</label>
				       				<textarea id="content" name="content" class="form-control">{{ $ps->content }}</textarea>

				       				@if($errors->has('content'))
							  			<span class="help-block">{{$errors->first('content')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group">
									 <img src="{{ asset('images/post/'.$ps->thumbnail) }}" style="margin-top:15px;max-height:100px;">
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
									<button type="submit" class="btn btn-sm btn-warning">Simpan Perubahan</button>
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
@stop

@section('footer')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
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