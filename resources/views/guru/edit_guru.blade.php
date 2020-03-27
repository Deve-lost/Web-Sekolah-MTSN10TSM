@extends('layouts.master')

@section('title')
	Edit Guru - {{ $guru->nama_lengkap }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Guru</h3>
							<p class="panel-subtitle">{{ $guru->nama_lengkap }}</p>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-guru/{{$guru->id}}/MTSN-10-TSM" enctype="multipart/form-data">
	      						@csrf
	      						<div class="form-group {{$errors->has('nig') ? ' has-error' : ''}}">
					       			<label for="nig">No Induk Pegawai</label>
					       			<input type="number" name="nig" placeholder="Masukkan Nig" class="form-control" value="{{ $guru->nig }}" readonly="">

					       			@if($errors->has('nig'))
							  			<span class="help-block">{{$errors->first('nig')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('nama_lengkap') ? ' has-error' : ''}}">
					       			<label for="nama_lengkap">Nama Lengkap</label>
					       			<input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" value="{{ $guru->nama_lengkap }}">

					       			@if($errors->has('nama_lengkap'))
							  			<span class="help-block">{{$errors->first('nama_lengkap')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
					       			<label for="ttl">Tempat Tanggal Lahir</label>
					       			<input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" value="{{ $guru->ttl }}">

					       			@if($errors->has('ttl'))
							  			<span class="help-block">{{$errors->first('ttl')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
					       			<label for="jenis_kelamin">Pilih Jenis Kelamin</label>
								    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								      <option value="Laki-laki" @if($guru->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
								      <option value="Perempuan" @if($guru->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
								    </select>

					       			@if($errors->has('jenis_kelamin'))
							  			<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
					       			<label for="agama">Agama</label>
					       			<input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" value="{{ $guru->agama }}">

					       			@if($errors->has('agama'))
							  			<span class="help-block">{{$errors->first('agama')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('telepon') ? ' has-error' : ''}}">
					       			<label for="telepon">Telepon</label>
					       			<input type="text" name="telepon" placeholder="Masukkan No Telp" class="form-control" value="{{ $guru->telepon }}">

					       			@if($errors->has('telepon'))
							  			<span class="help-block">{{$errors->first('telepon')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('jabatan') ? ' has-error' : ''}}">
					       			<label for="jabatan">Jabatan</label>
					       			<input type="text" name="jabatan" placeholder="Masukkan Jabatan Guru" class="form-control" value="{{ $guru->jabatan }}">

					       			@if($errors->has('jabatan'))
							  			<span class="help-block">{{$errors->first('jabatan')}}</span>
							  		@endif
				       			</div>

			       				<div class="form-group">
									<img src="{{ asset('images/guru/'.$guru->avatar) }}" style="margin-top:15px;max-height:100px;">
							   </div>

								<div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
								   <label for="avatar">Avatar</label>
								   <input id="avatar" class="form-control" type="file" name="avatar">

								   @if($errors->has('avatar'))
							  			<span class="help-block">{{$errors->first('avatar')}}</span>
							  		@endif
								 </div>

				       			<div class="form-group">
								    <label for="alamat">Alamat</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$guru->alamat}}</textarea>
								</div>

								<button class="btn btn-warning btn-sm" type="submit">Simpan Perubahan</button>
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