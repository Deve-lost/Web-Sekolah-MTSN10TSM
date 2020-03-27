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
							<form method="POST" action="/update-password-users/{{$pw->id}}/MTSN-10-TSM" enctype="multipart/form-data">
					       		@csrf
					       		<div class="form-group {{$errors->has('oldPassword') ? ' has-error' : ''}}">
					       			<label for="oldPassword">Masukkan Password Lama</label>
					       			<input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Masukkan Password Lama" value="{{ old('oldPassword') }}">

					       			@if($errors->has('oldPassword'))
							  			<span class="help-block">{{$errors->first('oldPassword')}}</span>
							  		@endif
					       		</div>

					       		<div class="form-group {{$errors->has('newPassword') ? ' has-error' : ''}}">
					       			<label for="newPassword">Masukkan Password Baru</label>
					       			<input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Masukkan Password Baru">

					       			@if($errors->has('newPassword'))
							  			<span class="help-block">{{$errors->first('newPassword')}}</span>
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