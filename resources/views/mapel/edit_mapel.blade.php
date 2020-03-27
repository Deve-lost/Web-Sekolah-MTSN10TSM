@extends('layouts.master')

@section('title')
	Edit Mata Pelajaran - {{ $mp->kode }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Mata Pelajaran</h3>
						</div>
						<div class="panel-body">
							<!-- Form -->
							<form method="POST" action="/update-mapel/{{$mp->id}}/MTSN-10-TSM">
					       		@csrf
					       		<div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
					       			<label for="kode">Kode Mapel</label>
					       			<input type="text" name="kode" class="form-control" id="kode" value="{{ $mp->kode }}" placeholder="Masukkan Kode Mata Pelajaran">

					       			@if($errors->has('kode'))
							  			<span class="help-block">{{$errors->first('kode')}}</span>
							  		@endif
					       		</div>

					       		<div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
					       			<label for="nama">Nama Mapel</label>
					       			<input type="text" name="nama" class="form-control" id="nama" value="{{ $mp->nama }}" placeholder="Masukkan Nama Mata Pelajaran">

					       			@if($errors->has('nama'))
							  			<span class="help-block">{{$errors->first('nama')}}</span>
							  		@endif
					       		</div>

					       		<div class="form-group {{$errors->has('semester') ? ' has-error' : ''}}">
					       			<label for="semester">Semester</label>
								    <select class="form-control" id="semester" name="semester">
								      <option value="Ganjil" @if($mp->semester == 'Ganjil') selected @endif>Ganjil</option>
								      <option value="Genap" @if($mp->semester == 'Genap') selected @endif>Genap</option>
								    </select>

					       			@if($errors->has('semester'))
							  			<span class="help-block">{{$errors->first('semester')}}</span>
							  		@endif
					   			</div>

					   			<div class="form-group {{$errors->has('guru_id') ? ' has-error' : ''}}">
					       			<label for="guru_id">Guru Pengajar</label>
								    <select class="form-control" id="guru_id" name="guru_id">
								    	@foreach($guru as $gr)
								      		<option value="{{$gr->id}}" 
								      		@if($gr->id === $mp->guru_id)
								  				selected
											@endif
											>
										    		{{ $gr->nama_lengkap }}
										    </option>
								        @endforeach
								    </select>

					       			@if($errors->has('guru_id'))
							  			<span class="help-block">{{$errors->first('guru_id')}}</span>
							  		@endif
					   			</div>

					   			<button type="submit" class="btn btn-warning btn-sm">Simpan Perubahan</button>
							</form>
						</div>
					</div>
					<!-- END Form -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop
