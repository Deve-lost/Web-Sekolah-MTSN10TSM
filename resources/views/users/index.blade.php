@extends('layouts.master')

@section('title')
	Data Users | MTSN 1O TASIKMALAYA
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
							<h3 class="panel-title">Data Users</h3>
							<div class="right">
							{{-- 
							<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn">
								<span class="lnr lnr-plus-circle"></span>
							</button>
							--}}
						</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3">
									<form class="" method="GET" action="/Data-Users/MTSN-10-TSM">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Users..." name="qUsers">
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
											<th>Nama</th>
											<th>Username</th>
											<th>Role</th>
											<th>Tanggal Pembuatan Akun</th>
											<th>Reset Password Default</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@forelse($user as $us)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $us->name }}</td>
											<td>{{ $us->username }}</td>
											<td>{{ $us->role }}</td>
											<td>{{ $us->created_at->format('D, d M y') }}</td>
											<td><a href="#" class="btn btn-sm btn-primary reset" rs-id="{{ $us->id }}" rs-nm="{{ $us->name }}">Reset Password</a></td>
											<td>
												<a href="/edit-users/{{$us->id}}/MTSN-10-TSM" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
												@if($us->role == 'Guru')
												<a href="#" class="btn btn-danger btn-sm delete" us-id="{{ $us->id }}" us-nm="{{ $us->name }}"><i class="lnr lnr-trash"></i></a>
												@endif
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="4"><b><i>Tidak Ada Data </i></b></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
      </div>
      <div class="modal-body">
       	<form method="POST" action="/store-users/MTSN-10-TSM" enctype="multipart/form-data">
       		@csrf
       		<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
       			<label for="name">Nama Users</label>
       			<input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Users">

       			@if($errors->has('name'))
		  			<span class="help-block">{{$errors->first('name')}}</span>
		  		@endif
       		</div>

       		<div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
       			<label for="username">Username</label>
       			<input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" placeholder="Masukkan Username">

       			@if($errors->has('username'))
		  			<span class="help-block">{{$errors->first('username')}}</span>
		  		@endif
       		</div>

       		<div class="form-group {{$errors->has('role') ? ' has-error' : ''}}">
	   			<input type="hidden" name="role" value="Admin">
	   			{{-- 
			    <select class="form-control" id="role" name="role">
			      <option value="Admin" {{(old('role') == 'Admin') ? ' selected' : ''}}>Admin</option>
			      <option value="Guru" {{(old('role') == 'Guru') ? ' selected' : ''}}>Guru</option>
			    </select>

	   			@if($errors->has('role'))
		  			<span class="help-block">{{$errors->first('role')}}</span>
		  		@endif
		  		--}}
			</div>

			<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
			   <label for="avatar">Avatar</label>
			   <input id="avatar" class="form-control" type="file" name="avatar">

			   @if($errors->has('avatar'))
		  			<span class="help-block">{{$errors->first('avatar')}}</span>
		  		@endif
			</div><br>

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
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

	//Delete
	<script type="text/javascript">
		$('.delete').click(function(){
			var us_id = $(this).attr('us-id');
			var us_nm = $(this).attr('us-nm');
			swal({
				  title: "Hapus!",
				  text: "User "+us_nm+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/destroy-users/"+us_id+"/MTSN-10-TSM";
				  }
				});
		});
	</script>

	//Reset Password
	<script type="text/javascript">
		$('.reset').click(function(){
			var rs_id = $(this).attr('rs-id');
			var rs_nm = $(this).attr('rs-nm');
			swal({
				  title: "Yakin!",
				  text: "Reset Password "+rs_nm+"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/reset-password/"+rs_id+"/MTSN-10-TSM";
				  }
				});
		});

	    //File Manager
	        $(document).ready(function(){
		        $('#lfm').filemanager('image');
	        });
	</script>
@stop