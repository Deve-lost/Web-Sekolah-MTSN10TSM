@extends('layouts.master')

@section('title')
	Edit Users - {{ $us->name }}
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
							<h3 class="panel-title">Edit Users - {{ $us->name }}</h3>
							@if(auth()->user()->role == 'Guru')
							<div class="right">
								<a href="/edit-password/{{$us->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning">Edit Password</a>
							</div>
							@endif
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-users/{{$us->id}}/MTSN-10-TSM" enctype="multipart/form-data">
					       		@csrf
					       		<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
					       			<label for="name">Nama Users</label>
					       			<input type="text" name="name" class="form-control" id="name" value="{{ $us->name }}" placeholder="Masukkan Nama Users">

					       			@if($errors->has('name'))
							  			<span class="help-block">{{$errors->first('name')}}</span>
							  		@endif
					       		</div>

					       		<div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
					       			<label for="username">Username</label>
					       			<input type="text" name="username" class="form-control" id="username" value="{{ $us->username }}" placeholder="Masukkan Username">

					       			@if($errors->has('username'))
							  			<span class="help-block">{{$errors->first('username')}}</span>
							  		@endif
					       		</div>

					       		<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
					       			<input type="hidden" name="password" class="form-control" id="password" value="{{ $us->password }}" placeholder="-- Kosongkan Password Jika Tidak Akan Diganti --">

					       			@if($errors->has('password'))
							  			<span class="help-block">{{$errors->first('password')}}</span>
							  		@endif
					       		</div>
								
								{{--
					       		<div class="form-group {{$errors->has('role') ? ' has-error' : ''}}">
						   			<label for="role">Pilih Role</label>
								    <select class="form-control" id="role" name="role">
								      <option value="Admin" @if($us->role == 'Admin') selected @endif>Admin</option>
								      <option value="Guru" @if($us->role == 'Guru') selected @endif>Guru</option>
								    </select>

						   			@if($errors->has('role'))
							  			<span class="help-block">{{$errors->first('role')}}</span>
							  		@endif
								</div>
								
					       		<div class="form-group">
									 <img src="{{ asset('images/users'.$us->getAvatar()) }}" style="margin-top:15px;max-height:100px;">
								</div>

						   		<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
								   <label for="avatar">Avatar</label>
								   <input id="avatar" class="form-control" type="file" name="avatar">

								   @if($errors->has('avatar'))
							  			<span class="help-block">{{$errors->first('avatar')}}</span>
							  		@endif
							  	</div><br>
								--}}

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

@section('footer')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop
