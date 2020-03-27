@extends('layouts.master')

@section('title')
	Data Guru | MTSN 1O TASIKMALAYA
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
							<h3 class="panel-title">Data Guru</h3>
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
									<form class="" method="GET" action="/data-guru/MTSN-10-TSM">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Guru..." name="qGuru">
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
											<th>Nip</th>
											<th>Nama Lengkap</th>
											<th>Jenis Kelamin</th>
											<th>Telp</th>
											<th>Jabatan</th>
											<th>Alamat</th>
											@if(auth()->user()->role == 'Admin')
											<th>Opsi</th>
											@endif
										</tr>
									</thead>
									<tbody>
										@forelse($guru as $r)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td><a href="/profile-guru/{{$r->id}}/MTSN-10-TSM">{{ $r->nig }}</a></td>
											<td><a href="/profile-guru/{{$r->id}}/MTSN-10-TSM">{{ $r->nama_lengkap }}</a></td>
											<td>{{ $r->jenis_kelamin }}</td>
											<td>{{ $r->telepon }}</td>
											<td>{{ $r->jabatan }}</td>
											<td>{{ $r->alamat }}</td>
											@if(auth()->user()->role == 'Admin')
											<td>
												<a href="/edit-guru/{{$r->id}}/MTSN-10-TSM" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-sm delete" guru-id="{{ $r->id }}" guru-nm="{{ $r->nama_lengkap }}"><i class="lnr lnr-trash"></i></a>
											</td>
											@endif
										</tr>
										@empty
										<tr>
											<td colspan="8"><b><i>Tidak Ada Data</i></b></td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							{!! $guru->links() !!}
						</div>
					</div>
					<!-- END TABLE STRIPED -->
				</div>
			</div>
		</div>
	</div>
</div>

@if(auth()->user()->role == 'Admin')
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	      <form method="POST" action="{{ route('store.guru') }}" enctype="multipart/form-data">
	      	@csrf
	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('nig') ? ' has-error' : ''}}">
		       			<label for="nig">No Induk Pegawai</label>
		       			<input type="number" name="nig" placeholder="Masukkan Nig" class="form-control" id="nig" value="{{ old('nig') }}">

		       			@if($errors->has('nig'))
				  			<span class="help-block">{{$errors->first('nig')}}</span>
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
	       			<div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
		       			<label for="username">Username</label>
		       			<input type="text" name="username" placeholder="Masukkan Username" class="form-control" id="username" value="{{ old('username') }}">

		       			@if($errors->has('username'))
				  			<span class="help-block">{{$errors->first('username')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
		       			<label for="ttl">Tempat Tanggal Lahir</label>
		       			<input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" id="ttl" value="{{ old('ttl') }}">

		       			@if($errors->has('ttl'))
				  			<span class="help-block">{{$errors->first('ttl')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
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

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
		       			<label for="agama">Agama</label>
		       			<input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" id="agama" value="{{ old('agama') }}">

		       			@if($errors->has('agama'))
				  			<span class="help-block">{{$errors->first('agama')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('telepon') ? ' has-error' : ''}}">
		       			<label for="telepon">Telepon</label>
		       			<input type="text" name="telepon" placeholder="Masukkan No Telp" class="form-control" id="telepon" value="{{ old('telepon') }}">

		       			@if($errors->has('telepon'))
				  			<span class="help-block">{{$errors->first('telepon')}}</span>
				  		@endif
	       			</div>
	       		</div>

	       		<div class="col-md-6 ml-auto">
	       			<div class="form-group {{$errors->has('jabatan') ? ' has-error' : ''}}">
		       			<label for="jabatan">Jabatan</label>
		       			<input type="text" name="jabatan" placeholder="Masukkan Jabatan Guru" class="form-control" id="jabatan" value="{{ old('jabatan') }}">

		       			@if($errors->has('jabatan'))
				  			<span class="help-block">{{$errors->first('jabatan')}}</span>
				  		@endif
	       			</div>
	       		</div>
	       	</div>

	       	<div class="row">
	       		<div class="col-md-12 ml-auto">
		       		 <label for="avatar">Avatar</label>
	       			 <div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
					   <input id="avatar" class="form-control" type="file" name="avatar">

					   @if($errors->has('avatar'))
				  			<span class="help-block">{{$errors->first('avatar')}}</span>
				  		@endif
					 </div>
	       		</div>
	       	</div>
	       	<br>
	       	<div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
			    <label for="alamat">Alamat</label>
			    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>

			    @if($errors->has('alamat'))
		  			<span class="help-block">{{$errors->first('alamat')}}</span>
		  		@endif
			</div>

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary btn-primary">Tambah Guru</button>
    	</form>
      </div>
    </div>
  </div>
</div>
@endif
@stop

@section('footer')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
		$('.delete').click(function(){
			var guru_id = $(this).attr('guru-id');
			var guru_nm = $(this).attr('guru-nm');
			swal({
				  title: "Hapus!",
				  text: "Guru "+ guru_nm +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-guru/"+guru_id+"/MTSN-10-TSM";
				  }
				});
		});

		//File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop