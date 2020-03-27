@extends('layouts.master')

@section('title')
	Ganti Password - {{ $pw->name }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- TABLE STRIPED -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Ganti Password - {{ $pw->name }}</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-password/{{$pw->id}}/MTSN-10-TSM" enctype="multipart/form-data">
					       		@csrf
					       		<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
					       			<label for="password">Masukkan Password Baru</label>
					       			<input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password Baru">

					       			@if($errors->has('password'))
							  			<span class="help-block">{{$errors->first('password')}}</span>
							  		@endif
					       		</div>

					       		<button class="btn btn-sm btn-warning">Simpan Perubahan</button>
							</form>
						</div>
					</div>
					<!-- END TABLE STRIPED -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop