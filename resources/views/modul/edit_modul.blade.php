@extends('layouts.master')

@section('title')
	Edit Modul - {{$md->judul}}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Modul Pelajaran - {{$md->judul}}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-modul/{{$md->id}}/MTSN-10-TSM" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
									<label for="judul">Nama Modul</label>
									<input type="text" name="judul" placeholder="Masukkan Nama Modul" id="judul" class="form-control" value="{{ $md->judul }}">

									@if($errors->has('judul'))
							  			<span class="help-block">{{$errors->first('judul')}}</span>
							  		@endif
								</div>

								<div class="form-group {{$errors->has('data') ? ' has-error' : ''}}">
					       			<label for="data">Modul</label>
					       			<input type="file" name="data" class="form-control" id="data">

					       			@if($errors->has('data'))
							  			<span class="help-block">{{$errors->first('data')}}</span>
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
