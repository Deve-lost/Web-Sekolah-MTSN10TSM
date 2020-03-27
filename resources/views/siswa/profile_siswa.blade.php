@extends('layouts.master')

@section('header')
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('title')
	Profile Siswa - {{$siswa->nama_lengkap}}
@stop

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="{{$siswa->avatar() }}" class="img-circle" alt="Avatar" width="130" height="130">
								<h3 class="name">{{$siswa->nama_lengkap}}</h3>
								<span class="online-status status-available">Siswa</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-6 stat-item">
										{{$siswa->mapel->count()}} <span>Mapel</span>
									</div>
									<div class="col-md-6 stat-item">
										{{$siswa->rank()}}	<span>Rata-rata Nilai</span>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Data Diri</h4>
								<ul class="list-unstyled list-justify">
									<li>No Induk Siswa <span> {{$siswa->nis}}<span></li>
									<li>Nama Lengkap <span> {{$siswa->nama_lengkap}}<span></li>
									<li>TTL <span> {{$siswa->ttl}}</span></li>
									<li>Jenis Kelamin <span> {{$siswa->jenis_kelamin}}</span></li>
									<li>Agama <span> {{$siswa->agama}}</span></li>
									<li>Alamat <span> {{$siswa->alamat}}</span></li>
								</ul>
							</div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right" style="min-height: 570px;">
						<!-- TABBED CONTENT -->
						<div class="custom-tabs-line tabs-line-bottom left-aligned">
							<ul class="nav" role="tablist">
								<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Mata Pelajaran</a></li>
								<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Nilai</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-bottom-left1">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
								  Tambah Nilai
								</button>
								<br><br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode</th>
												<th>Nama Mapel</th>
												<th>Semester</th>
												<th>Nilai</th>
												<th>Guru</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											@forelse($siswa->mapel as $matapel)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $matapel->kode }}</td>
												<td>{{ $matapel->nama }}</td>
												<td>{{ $matapel->semester }}</td>
												<td><a href="#" class="nilai"  data-type="text" data-pk="{{$matapel->id}}" data-url="/api/nilai/{{$siswa->id}}/update" data-title="Edit Nilai">{{ $matapel->pivot->nilai }}</a></td>
												<td>
													<a href="/profile-guru/{{ $matapel->guru->id }}/MTSN-10-TSM">{{ $matapel->guru->nama_lengkap }}</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$siswa->id}}" mapel-id="{{$matapel->id}}" mapel-nama="{{$matapel->nama}}"><i class="lnr lnr-trash"></i></a>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="7"><b><i>Tidak Ada Data</i></b></td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-bottom-left2">
								<div id="chartNilai"></div>
							</div>
						</div>
						<!-- END TABBED CONTENT -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/add-nilai-siswa/{{$siswa->id}}/MTSN-10-TSM">
        	@csrf
        	<div class="form-group">
			    <label for="mapel">Mata Pelajaran</label>
			    <select class="form-control" id="mapel" name="mapel">
			    	@foreach($mapel as $mp)
			      	<option value="{{$mp->id}}">{{$mp->nama}} - {{$mp->kode}}</option>
			      	@endforeach
			    </select>
			 </div>

        	<div class="form-group {{$errors->has('nilai') ? ' has-error' : ''}}">
			    <label for="nilai">Nilai</label>
			    <input type="text" class="form-control" id="nilai" placeholder="Nilai" name="nilai" value="{{ old('nilai') }}">
		  	
			  	@if($errors->has('nilai'))
			  		<span class="help-block">{{$errors->first('nilai')}}</span>
			  	@endif
		  	</div>
	  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Nilai</button>
		</form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
	<!-- Highcarts -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!-- Cart Siswa -->
<script>
	Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
	    },
	    title: {
	        text: 'Laporan Nilai Siswa'
	    },
	    xAxis: {
	        categories: {!!json_encode($categories)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Nilai'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Nilai',
	        data: {!! json_encode($data) !!}

	    }]
	});

	// Ajax
	$(document).ready(function() {
	    $('.nilai').editable();
	});
</script>

<!-- Destroy -->
<script type="text/javascript">
	$('.delete').click(function(){
		var siswa_id = $(this).attr('siswa-id');
		var mapel_id = $(this).attr('mapel-id');
		var mapel_nama = $(this).attr('mapel-nama');
		swal({
			  title: "Hapus!",
			  text: "Nilai Siswa Dengan Mapel "+mapel_nama+"?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	window.location = "/destroy-siswa/"+siswa_id+"/"+mapel_id+"";
			  }
			});
	});

	$(document).ready(function() {
    $('.nilai').editable();
	});

</script>
@stop