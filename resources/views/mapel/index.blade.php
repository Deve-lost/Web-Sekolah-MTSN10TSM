@extends('layouts.master')

@section('title')
	Data Mata Pelajaran | MTSN 1O TASIKMALAYA
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
							<h3 class="panel-title">Data Mata Pelajaran</h3>
							<div class="right">
							<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn">
								<span class="lnr lnr-plus-circle"></span>
							</button>
						</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3">
									<form class="" method="GET" action="/data-mapel/MTSN-10-TSM">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Mata Pelajaran..." name="qMapel">
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
											<th>Kode</th>
											<th>Nama</th>
											<th>Semester</th>
											<th>Pengajar</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@forelse($mapel as $mp)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $mp->kode }}</td>
											<td>{{ $mp->nama }}</td>
											<td>{{ $mp->semester }}</td>
											<td><a href="/profile-guru/{{ $mp->guru->id }}/MTSN-10-TSM">{{ $mp->guru->nama_lengkap }}</a></td>
											<td>
												<a href="/edit-mapel/{{$mp->id}}/MTSN-10-TSM" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-sm delete" mp-id="{{$mp->id}}" mp-nm="{{$mp->nama}}"><i class="lnr lnr-trash"></i></a>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="6"><b><i>Tidak Ada Data</i></b></td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END TABLE STRIPED -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
      </div>
      <div class="modal-body">
       	<form method="POST" action="/store-mapel/MTSN-10-TSM">
       		@csrf
       		<div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
       			<label for="kode">Kode Mapel</label>
       			<input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}" placeholder="Masukkan Kode Mata Pelajaran">

       			@if($errors->has('kode'))
		  			<span class="help-block">{{$errors->first('kode')}}</span>
		  		@endif
       		</div>

       		<div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
       			<label for="nama">Nama Mapel</label>
       			<input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Mata Pelajaran">

       			@if($errors->has('nama'))
		  			<span class="help-block">{{$errors->first('nama')}}</span>
		  		@endif
       		</div>

       		<div class="form-group {{$errors->has('semester') ? ' has-error' : ''}}">
       			<label for="semester">Semester</label>
			    <select class="form-control" id="semester" name="semester">
			      <option value="Ganjil" {{(old('semester') == 'Ganjil') ? ' selected' : ''}}>Ganjil</option>
			      <option value="Genap" {{(old('semester') == 'Genap') ? ' selected' : ''}}>Genap</option>
			    </select>

       			@if($errors->has('semester'))
		  			<span class="help-block">{{$errors->first('semester')}}</span>
		  		@endif
   			</div>

   			<div class="form-group {{$errors->has('guru_id') ? ' has-error' : ''}}">
       			<label for="guru_id">Guru Pengajar</label>
			    <select class="form-control" id="guru_id" name="guru_id">
			      @foreach($gurus as $gr)
			      <option value="{{$gr->id}}">{{$gr->nama_lengkap}}</option>
			      @endforeach
			    </select>

       			@if($errors->has('guru_id'))
		  			<span class="help-block">{{$errors->first('guru_id')}}</span>
		  		@endif
   			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
		</form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
	<script type="text/javascript">
		$('.delete').click(function(){
			var mp_id = $(this).attr('mp-id');
			var mp_nama = $(this).attr('mp-nm');
			swal({
				  title: "Hapus!",
				  text: "Mata Pelajaran "+mp_nama+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-mapel/"+mp_id+"/MTSN-10-TSM";
				  }
				});
		});
	</script>
@stop