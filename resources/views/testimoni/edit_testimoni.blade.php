@extends('layouts.master')

@section('title')
	Edit Testimoni - {{ $ts->nama }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Testimoni - {{ $ts->nama }}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-testimoni/{{$ts->id}}/MTSN-10-TSM" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
									<label for="nama">Nama Alumni</label>
									<input type="text" name="nama" placeholder="Masukkan Nama" id="nama" class="form-control" value="{{ $ts->nama }}">

									@if($errors->has('nama'))	
										<span class="help-block">{{$errors->first('nama')}}</span>
							  		@endif
								</div>

								<div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
									<label for="status">Status</label>
									<input type="text" name="status" placeholder="Masukkan Status" id="status" class="form-control" value="{{ $ts->status }}">

									@if($errors->has('status'))	
										<span class="help-block">{{$errors->first('status')}}</span>
							  		@endif
								</div>

								<div class="form-group {{$errors->has('lulusan') ? ' has-error' : ''}}">
									<label for="lulusan">Lulusan Tahun</label>
									<input type="text" name="lulusan" placeholder="Masukkan Lulusan" id="lulusan" class="form-control" value="{{ $ts->lulusan }}">

									@if($errors->has('lulusan'))	
										<span class="help-block">{{$errors->first('lulusan')}}</span>
							  		@endif
								</div>

								<div class="form-group {{$errors->has('caption') ? ' has-error' : ''}}">
				       				<label for="caption">Caption</label>
				       				<textarea id="caption" name="caption" class="form-control">{{ $ts->caption }}</textarea>

				       				@if($errors->has('caption'))
							  			<span class="help-block">{{$errors->first('caption')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group">
									 <img src="{{ asset('images/testimoni/'.$ts->avatar) }}"  style="margin-top:15px;max-height:100px;">
								 </div>

								<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
								   <label for="avatar">Avatar</label>
								   <input id="avatar" class="form-control" type="file" name="avatar">

								   @if($errors->has('avatar'))
							  			<span class="help-block">{{$errors->first('avatar')}}</span>
							  		@endif
								 </div><br>

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
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
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