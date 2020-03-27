@extends('layouts.master')

@section('title')
	Edit Data Sekolah | {{ $ds->judul }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Sekolah - {{ $ds->judul }}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="{{ route('update.ds', $ds->id) }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
					       			<label for="judul">Judul</label>
					       			<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" id="judul" value="{{ $ds->judul }}">

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
				       				<textarea id="deskripsi" name="deskripsi" class="form-control">{{ $ds->deskripsi }}</textarea>

				       				@if($errors->has('deskripsi'))
							  			<span class="help-block">{{$errors->first('deskripsi')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group">
									 <img src="{{asset('images/data sekolah/'.$ds->image) }}" style="margin-top:15px;max-height:100px;">
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

				       			<button type="submit" class="btn btn-sm btn-warning">Simpan Perubahan</button>
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
	<script type="text/javascript">
		// Ckeditor
	    ClassicEditor
	        .create( document.querySelector( '#deskripsi' ) )
	        .catch( error => {
	            console.error( error );
	        } );
	</script>
@stop