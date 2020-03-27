<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="/MTSN-10-Tsm.sch.id"><img src="{{asset('admin/assets/img/brand.png')}}" width="100" height="100" alt="MTSN 10 TSM Logo" class="img-responsive logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a>{{auth()->user()->role}}</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/users/'.auth()->user()->getAvatar())}}" class="img-circle" alt="Avatar"> <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<li><a href="/Profile-Users/{{auth()->user()->id}}/MTSN-10-TSM"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
						<li><a href="#" class="Logout"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>