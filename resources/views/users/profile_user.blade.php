@extends('layouts.master')

@section('title')
	Profile Users - {{ $pu->name }}
@stop

@section('content')
<div class="main">
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
								<a href="#" data-toggle="modal" data-target="#exampleModal"><img src="{{asset('images/users/'.$pu->getAvatar())}}" class="img-circle" alt="Avatar" width="120" height="120"></a>
								
								<h3 class="name">{{ $pu->name }}</h3>
								<span class="online-status status-available">{{ $pu->role }}</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right" style="height: 213px;">
						<h4 class="heading">Profile Users - {{ $pu->name }}</h4>
						<!-- <div class="row">
							<div class="col-md-6"> -->
								<ul class="list-unstyled list-justify">
									<li>Nama Users <span> {{ $pu->name }}<span></li>
									<li>Username <span> {{ $pu->username }}<span></li>
									<li>Role <span> {{ $pu->role }}</span></li>
								</ul>
								<div class="panel-footer">
									<a href="/edit-password-users/{{$pu->id}}/MTSN-10-TSM" class="btn btn-sm btn-warning">Ganti Password</a>
								</div>
							<!-- </div>
						</div> -->
					</div>
					<!-- END RIGHT COLUMN -->
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
        <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profile</h5>
      </div>
      <div class="modal-body">
      <form method="POST" action="/update-avatar/{{$pu->id}}/MTSN-10-TSM" enctype="multipart/form-data">
      	@csrf
   		<div class="form-group">
			 <img src="{{ asset('images/users/'.$pu->avatar) }}" style="margin-top:15px;max-height:100px;">
		</div>

   		<div class="input-group {{$errors->has('avatar') ? ' has-error' : ''}}">
		  <label for="avatar">Avatar</label>
		   <input id="avatar" class="form-control" type="file" name="avatar">

		   @if($errors->has('avatar'))
	  			<span class="help-block">{{$errors->first('avatar')}}</span>
	  		@endif
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    	</form>
      </div>
    </div>
  </div>
</div>
@stop