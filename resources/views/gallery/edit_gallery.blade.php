@extends('layouts.master')

@section('title')
	Edit Gallery - {{ $gr->caption }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Gallery - {{ $gr->caption }}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-gallery/{{$gr->id}}/MTSN-10-TSM" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('caption') ? ' has-error' : ''}}">
									<label for="caption">Caption</label>
									<input type="text" name="caption" placeholder="Masukkan Caption" id="caption" class="form-control" value="{{ $gr->caption }}">

									@if($errors->has('caption'))
							  			<span class="help-block">{{$errors->first('caption')}}</span>
							  		@endif
								</div>

								<div class="form-group">
									 <img src="{{ $gr->image }}" style="margin-top:15px;max-height:100px;" alt="Gambar Sebelumnya">
								 </div>

								<div class="input-group {{$errors->has('image') ? ' has-error' : ''}}">
								   <label for="image">Gambar</label>
								   <input id="image" class="form-control" type="file" name="image">

								   @if($errors->has('image'))
							  			<span class="help-block">{{$errors->first('image')}}</span>
							  		@endif
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
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop