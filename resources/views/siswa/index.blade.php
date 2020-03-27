@extends('layouts.master')

@section('title')
	Data Siswa | MTSN 1O TASIKMALAYA
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Siswa</h3>
							@if(auth()->user()->role == 'Admin')
							<div class="right">
								<button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="lnr lnr-plus-circle"></i></button>
							</div>
							@endif
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3">
									<form class="" method="GET" action="{{ route('data.siswa') }}">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Siswa..." name="qSiswa">
											<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button></span>
										</div>
									</form>
								</div>
							</div><br>
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nis</th>
											<th>Nama Lengkap</th>
											<th>Jenis Kelamin</th>
											<th>Kelas</th>
											<th>Rata-rata Nilai</th>
											@if(auth()->user()->role == 'Admin')
											<th>Opsi</th>
											@endif
										</tr>
									</thead>
									<tbody>
										@forelse($siswa as $r)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td><a href="/profile-siswa/{{$r->id}}/MTSN-10-TSM">{{ $r->nis }}</a></td>
											<td><a href="/profile-siswa/{{$r->id}}/MTSN-10-TSM">{{ $r->nama_lengkap }}</a></td>
											<td>{{ $r->jenis_kelamin }}</td>
											<td>{{ $r->kelas }}</td>
											<td>{{ $r->rank() }}</td>
											@if(auth()->user()->role == 'Admin')
											<td>
												<a href="/edit-siswa/{{$r->id}}/MTSN-10-TSM" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-sm delete" siswa-nm="{{$r->nama_lengkap}}" siswa-id="{{$r->id}}"><i class="lnr lnr-trash"></i></a>
											</td>
											@endif
										</tr>
										@empty
										<tr>
											<td colspan="7"><b><i>Tidak Ada Data</i></b></td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							{!! $siswa->links() !!}
						</div>
					</div>
					<!-- END TABLE STRIPED -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	      <form method="POST" action="/store-siswa/MTSN-10-TSM" enctype="multipart/form-data">
	      	@csrf
	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('nis') ? ' has-error' : ''}}">
		       			<label for="nis">No Induk Siswa</label>
		       			<input type="number" name="nis" placeholder="Masukkan Nis" class="form-control" id="nis" value="{{ old('nis') }}">

		       			@if($errors->has('nis'))
				  			<span class="help-block">{{$errors->first('nis')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('nama_lengkap') ? ' has-error' : ''}}">
		       			<label for="nama_lengkap">Nama Lengkap</label>
		       			<input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" id="nama_lengkap" value="{{ old('nama_lengkap') }}">

		       			@if($errors->has('nama_lengkap'))
				  			<span class="help-block">{{$errors->first('nama_lengkap')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
		       			<label for="ttl">Tempat Tanggal Lahir</label>
		       			<input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" id="ttl" value="{{ old('ttl') }}">

		       			@if($errors->has('ttl'))
				  			<span class="help-block">{{$errors->first('ttl')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
		       			<label for="jenis_kelamin">Pilih Jenis Kelamin</label>
					    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
					      <option value="Laki-laki" {{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}}>Laki-laki</option>
					      <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
					    </select>

		       			@if($errors->has('jenis_kelamin'))
				  			<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
		       			<label for="agama">Agama</label>
		       			<input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" id="agama" value="{{ old('agama') }}">

		       			@if($errors->has('agama'))
				  			<span class="help-block">{{$errors->first('agama')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
		       			<label for="kelas">Kelas</label>
		       			<input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control" id="kelas" value="{{ old('kelas') }}">

		       			@if($errors->has('kelas'))
				  			<span class="help-block">{{$errors->first('kelas')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-12 ml-auto">
	       			<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
					   <label for="avatar">Avatar</label>
					   <input id="avatar" class="form-control" type="file" name="avatar">

					   @if($errors->has('avatar'))
				  			<span class="help-block">{{$errors->first('avatar')}}</span>
				  		@endif
					 </div>
	       		</div>
	       	</div>

	       	<div class="form-group">
			    <label for="alamat">Alamat Siswa</label>
			    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>

			    @if($errors->has('alamat'))
		  			<span class="help-block">{{$errors->first('alamat')}}</span>
		  		@endif
			</div>

			<!-- Insert Data Buku Induk -->
			<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('anak_ke') ? ' has-error' : ''}}">
		       			<label for="anak_ke">Anak Ke-</label>
		       			<input type="string" name="anak_ke" placeholder="Anak ke-" class="form-control" id="anak_ke" value="{{ old('anak_ke') }}">

		       			@if($errors->has('anak_ke'))
				  			<span class="help-block">{{$errors->first('anak_ke')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('nama_ayah') ? ' has-error' : ''}}">
		       			<label for="nama_ayah">Nama Ayah</label>
		       			<input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" id="nama_ayah" value="{{ old('nama_ayah') }}">

		       			@if($errors->has('nama_ayah'))
				  			<span class="help-block">{{$errors->first('nama_ayah')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('pendidikan_ayah') ? ' has-error' : ''}}">
		       			<label for="pendidikan_ayah">Pendidikan Ayah</label>
		       			<input type="text" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Ayah" class="form-control" id="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}">

		       			@if($errors->has('pendidikan_ayah'))
				  			<span class="help-block">{{$errors->first('pendidikan_ayah')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('pekerjaan_ayah') ? ' has-error' : ''}}">
		       			<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
		       			<input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">

		       			@if($errors->has('pekerjaan_ayah'))
				  			<span class="help-block">{{$errors->first('pekerjaan_ayah')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('penghasilan_ayah') ? ' has-error' : ''}}">
		       			<label for="penghasilan_ayah">Penghasilan Ayah</label>
		       			<input type="text" name="penghasilan_ayah" placeholder="Penghasilan Ayah" class="form-control" id="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}">

		       			@if($errors->has('penghasilan_ayah'))
				  			<span class="help-block">{{$errors->first('penghasilan_ayah')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('nama_ibu') ? ' has-error' : ''}}">
		       			<label for="nama_ibu">Nama Ibu</label>
		       			<input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" id="nama_ibu" value="{{ old('nama_ibu') }}">

		       			@if($errors->has('nama_ibu'))
				  			<span class="help-block">{{$errors->first('nama_ibu')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('pendidikan_ibu') ? ' has-error' : ''}}">
		       			<label for="pendidikan_ibu">Pendidikan Ibu</label>
		       			<input type="text" name="pendidikan_ibu" placeholder="Pendidikan Ibu" class="form-control" id="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}">

		       			@if($errors->has('pendidikan_ibu'))
				  			<span class="help-block">{{$errors->first('pendidikan_ibu')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('pekerjaan_ibu') ? ' has-error' : ''}}">
		       			<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
		       			<input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">

		       			@if($errors->has('pekerjaan_ibu'))
				  			<span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-12 ml-auto">
	       			<div class="form-group {{$errors->has('penghasilan_ibu') ? ' has-error' : ''}}">
		       			<label for="penghasilan_ibu">Penghasilan Ibu</label>
		       			<input type="text" name="penghasilan_ibu" placeholder="Penghasilan Ibu" class="form-control" id="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}">

		       			@if($errors->has('penghasilan_ibu'))
				  			<span class="help-block">{{$errors->first('penghasilan_ibu')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="form-group">
			    <label for="alamat_ortu">Alamat Orang Tua</label>
			    <textarea class="form-control" id="alamat_ortu" rows="3" name="alamat_ortu">{{ old('alamat_ortu') }}</textarea>

			    @if($errors->has('alamat_ortu'))
		  			<span class="help-block">{{$errors->first('alamat_ortu')}}</span>
		  		@endif
			</div>

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary btn-primary">Tambah Siswa</button>
    	</form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
		$('.delete').click(function(){
			var siswa_id = $(this).attr('siswa-id');
			var siswa_nm = $(this).attr('siswa-nm');
			swal({
				  title: "Hapus!",
				  text: "Siswa "+siswa_nm+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-siswa/"+siswa_id+"/MTSN-10-TSM";
				  }
				});
		});

		//File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop