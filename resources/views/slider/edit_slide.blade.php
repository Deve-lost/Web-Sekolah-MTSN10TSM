@extends('layouts.master')

@section('title')
	Edit Slide
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Slide</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="{{ route('update.slide', $hs->id) }}" enctype="multipart/form-data">
						      	@csrf
				       			<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
					       			<label for="title">Title</label>
					       			<input type="text" name="title" placeholder="Masukkan Title" class="form-control" id="title" value="{{ $hs->title }}">

					       			@if($errors->has('title'))
							  			<span class="help-block">{{$errors->first('title')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('quotes') ? ' has-error' : ''}}">
					       			<label for="quotes">Quotes</label>
					       			<input type="text" name="quotes" placeholder="-- Kosongkan Jika Tidak Diperlukan --" class="form-control" id="quotes" value="{{ $hs->quotes }}">

					       			@if($errors->has('quotes'))
							  			<span class="help-block">{{$errors->first('quotes')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group">
									 <img src="{{ asset('images/hero slide/'.$hs->image) }}" style="margin-top:15px;max-height:100px;">
								 </div>

								 <div class="input-group {{$errors->has('image') ? ' has-error' : ''}}">
				       			 <label for="image">Image</label>
								   <input id="image" class="form-control" type="file" name="image" value="{{ $hs->image }}">

								   @if($errors->has('image'))
							  			<span class="help-block">{{$errors->first('image')}}</span>
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