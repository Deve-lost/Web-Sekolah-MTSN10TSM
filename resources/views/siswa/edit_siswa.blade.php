@extends('layouts.master')

@section('title')
	Edit Siswa - {{$siswa->nama_lengkap}}
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
							<h3 class="panel-title">Edit Siswa</h3>
							<p class="panel-subtitle">{{$siswa->nama_lengkap}}</p>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-siswa/{{$siswa->id}}/MTSN-10-TSM" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('nis') ? ' has-error' : ''}}">
					       			<label for="nis">No Induk Siswa</label>
					       			<input type="number" name="nis" placeholder="Masukkan Nis" class="form-control" id="nis" value="{{ $siswa->nis }}" readonly="">

					       			@if($errors->has('nis'))
							  			<span class="help-block">{{$errors->first('nis')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('nama_lengkap') ? ' has-error' : ''}}">
					       			<label for="nama_lengkap">Nama Lengkap</label>
					       			<input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" id="nama_lengkap" value="{{ $siswa->nama_lengkap }}">

					       			@if($errors->has('nama_lengkap'))
							  			<span class="help-block">{{$errors->first('nama_lengkap')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
					       			<label for="ttl">Tempat Tanggal Lahir</label>
					       			<input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" id="ttl" value="{{ $siswa->ttl }}">

					       			@if($errors->has('ttl'))
							  			<span class="help-block">{{$errors->first('ttl')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
					       			<label for="jenis_kelamin">Pilih Jenis Kelamin</label>
								    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								      <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
								      <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
								    </select>

					       			@if($errors->has('jenis_kelamin'))
							  			<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
					       			<label for="agama">Agama</label>
					       			<input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" id="agama" value="{{ $siswa->agama }}">

					       			@if($errors->has('agama'))
							  			<span class="help-block">{{$errors->first('agama')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
					       			<label for="kelas">Kelas</label>
					       			<input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control" id="kelas" value="{{ $siswa->kelas }}">

					       			@if($errors->has('kelas'))
							  			<span class="help-block">{{$errors->first('kelas')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group">
									 <img src="{{ asset('images/siswa/'.$siswa->avatar) }}" style="margin-top:15px;max-height:100px;">
								 </div>

				       			<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
					       		   <label for="avatar">Avatar</label>
								   <input id="avatar" class="form-control" type="file" name="avatar">

								   @if($errors->has('avatar'))
							  			<span class="help-block">{{$errors->first('avatar')}}</span>
							  		@endif
								 </div>

								 <div class="form-group">
									 <img id="holder" style="margin-top:15px;max-height:100px;">
								 </div>

				       			 <div class="form-group">
								    <label for="alamat">Alamat Siswa</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $siswa->alamat }}</textarea>
								</div>

								<button type="submit" class="btn btn-sm btn-warning">Simpan Perubahaan</button>
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