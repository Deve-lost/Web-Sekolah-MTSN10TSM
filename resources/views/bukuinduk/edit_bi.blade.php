@extends('layouts.master')

@section('title')
	Edit Buku Induk - {{ $bi->nama_lengkap }}
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
							<h3 class="panel-title">Edit Buku Induk</h3>
							<p class="panel-subtitle">{{ $bi->nama_lengkap }}</p>
						</div>
						<div class="panel-body">
							<form method="POST" action="/update-buku-induk/{{$bi->id}}/MTSN-10-TSM" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{$errors->has('nis') ? ' has-error' : ''}}">
					       			<label for="nis">No Induk Siswa</label>
					       			<input type="number" name="nis" placeholder="Masukkan Nis" class="form-control" id="nis" value="{{ $bi->nis }}" readonly="">

					       			@if($errors->has('nis'))
							  			<span class="help-block">{{$errors->first('nis')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('nama_lengkap') ? ' has-error' : ''}}">
					       			<label for="nama_lengkap">Nama Lengkap</label>
					       			<input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" id="nama_lengkap" value="{{ $bi->nama_lengkap }}">

					       			@if($errors->has('nama_lengkap'))
							  			<span class="help-block">{{$errors->first('nama_lengkap')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
					       			<label for="ttl">Tempat Tanggal Lahir</label>
					       			<input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" id="ttl" value="{{ $bi->ttl }}">

					       			@if($errors->has('ttl'))
							  			<span class="help-block">{{$errors->first('ttl')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
					       			<label for="jenis_kelamin">Pilih Jenis Kelamin</label>
								    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								      <option value="Laki-laki" @if($bi->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
								      <option value="Perempuan" @if($bi->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
								    </select>

					       			@if($errors->has('jenis_kelamin'))
							  			<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
					       			<label for="agama">Agama</label>
					       			<input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" id="agama" value="{{ $bi->agama }}">

					       			@if($errors->has('agama'))
							  			<span class="help-block">{{$errors->first('agama')}}</span>
							  		@endif
				       			</div>

				       			<div class="row">
									<div class="col-md-3">
										<div class="img-thumbnail">
											<img src="{{$bi->getAvatar()}}" class="rounded float-left" alt="image" style="width:100%">
										</div>
									</div>
								</div>

				       			<div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
					       			<label for="avatar">Avatar</label>
					       			<input type="file" name="avatar" class="form-control" id="avatar">

					       			@if($errors->has('avatar'))
							  			<span class="help-block">{{$errors->first('avatar')}}</span>
							  		@endif
				       			</div>

				       			 <div class="form-group">
								    <label for="alamat">Alamat Siswa</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $bi->alamat }}</textarea>
								</div>


								<div class="form-group {{$errors->has('anak_ke') ? ' has-error' : ''}}">
					       			<label for="anak_ke">Anak Ke-</label>
					       			<input type="text" name="anak_ke" placeholder="Anak ke-" class="form-control" id="anak_ke" value="{{ $bi->anak_ke }}">

					       			@if($errors->has('anak_ke'))
							  			<span class="help-block">{{$errors->first('anak_ke')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('nama_ayah') ? ' has-error' : ''}}">
					       			<label for="nama_ayah">Nama Ayah</label>
					       			<input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" id="nama_ayah" value="{{ $bi->nama_ayah }}">

					       			@if($errors->has('nama_ayah'))
							  			<span class="help-block">{{$errors->first('nama_ayah')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('pendidikan_ayah') ? ' has-error' : ''}}">
					       			<label for="pendidikan_ayah">Pendidikan Ayah</label>
					       			<input type="text" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Ayah" class="form-control" id="pendidikan_ayah" value="{{ $bi->pendidikan_ayah }}">

					       			@if($errors->has('pendidikan_ayah'))
							  			<span class="help-block">{{$errors->first('pendidikan_ayah')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('pekerjaan_ayah') ? ' has-error' : ''}}">
					       			<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
					       			<input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control" id="pekerjaan_ayah" value="{{ $bi->pekerjaan_ayah }}">

					       			@if($errors->has('pekerjaan_ayah'))
							  			<span class="help-block">{{$errors->first('pekerjaan_ayah')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('penghasilan_ayah') ? ' has-error' : ''}}">
					       			<label for="penghasilan_ayah">Penghasilan Ayah</label>
					       			<input type="text" name="penghasilan_ayah" placeholder="Penghasilan Ayah" class="form-control" id="penghasilan_ayah" value="{{ $bi->penghasilan_ayah }}">

					       			@if($errors->has('penghasilan_ayah'))
							  			<span class="help-block">{{$errors->first('penghasilan_ayah')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('nama_ibu') ? ' has-error' : ''}}">
					       			<label for="nama_ibu">Nama Ibu</label>
					       			<input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" id="nama_ibu" value="{{ $bi->nama_ibu }}">

					       			@if($errors->has('nama_ibu'))
							  			<span class="help-block">{{$errors->first('nama_ibu')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('pendidikan_ibu') ? ' has-error' : ''}}">
					       			<label for="pendidikan_ibu">Pendidikan Ibu</label>
					       			<input type="text" name="pendidikan_ibu" placeholder="Pendidikan Ibu" class="form-control" id="pendidikan_ibu" value="{{ $bi->pendidikan_ibu }}">

					       			@if($errors->has('pendidikan_ibu'))
							  			<span class="help-block">{{$errors->first('pendidikan_ibu')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('pekerjaan_ibu') ? ' has-error' : ''}}">
					       			<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
					       			<input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control" id="pekerjaan_ibu" value="{{ $bi->pekerjaan_ibu }}">

					       			@if($errors->has('pekerjaan_ibu'))
							  			<span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
							  		@endif
				       			</div>

				       			<div class="form-group {{$errors->has('penghasilan_ibu') ? ' has-error' : ''}}">
					       			<label for="penghasilan_ibu">Penghasilan Ibu</label>
					       			<input type="text" name="penghasilan_ibu" placeholder="Penghasilan Ibu" class="form-control" id="penghasilan_ibu" value="{{ $bi->penghasilan_ibu }}">

					       			@if($errors->has('penghasilan_ibu'))
							  			<span class="help-block">{{$errors->first('penghasilan_ibu')}}</span>
							  		@endif
				       			</div>

				       		 	<div class="form-group">
								    <label for="alamat_ortu">Alamat Orang Tua</label>
								    <textarea class="form-control" id="alamat_ortu" rows="3" name="alamat_ortu">{{ $bi->alamat_ortu }}</textarea>
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
