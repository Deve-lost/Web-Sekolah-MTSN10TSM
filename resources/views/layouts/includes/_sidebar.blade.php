<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="{{ route('dashboard') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				<!-- <li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-list"></i> <span>MTSN 10 TSM</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="{{ route('profile.sekolah') }}" class="">Profile Sekolah</a></li>
							<li><a href="" class="">Sambutan Kepala Sekolah</a></li>
							<li><a href="" class="">Visi Misi</a></li>
							<li><a href="" class="">Kontak</a></li>
						</ul>
					</div>
				</li> -->
				@if(auth()->user()->role == 'Admin')
				<li><a href="{{ route('home.slide') }}" class=""><i class="lnr lnr-home"></i> <span>Home Slide</span></a></li>
				@endif
				@if(auth()->user()->role == 'Admin')
				<li><a href="{{ route('data.sekolah') }}" class=""><i class="lnr lnr-database"></i> <span>Data Sekolah</span></a></li>
				@endif
				{{-- 
				<li><a href="{{ route('data.guru') }}" class=""><i class="lnr lnr-users"></i> <span>Data Guru</span></a></li>
				<li><a href="{{ route('data.siswa') }}" class=""><i class="lnr lnr-users"></i> <span>Data Siswa</span></a></li>
				<li><a href="{{ route('bukuinduk') }}" class=""><i class="lnr lnr-book"></i> <span>Data Buku Induk</span></a></li>
				<li><a href="{{ route('data.mapel') }}" class=""><i class="lnr lnr-book"></i> <span>Data Mapel</span></a></li>
				--}}
				@if(auth()->user()->role == 'Admin')
				<li><a href="{{ route('publish') }}" class=""><i class="lnr lnr-pencil"></i> <span>Publish</span></a></li>
				<li><a href="{{ route('testimoni') }}" class=""><i class="lnr lnr-graduation-hat"></i> <span>Testimoni Alumni</span></a></li>
				<li><a href="{{ route('prestasi') }}" class=""><i class="lnr lnr-linearicons"></i> <span>Prestasi</span></a></li>
				<li><a href="{{ route('gallery') }}" class=""><i class="lnr lnr-picture"></i> <span>Gallery</span></a></li>
				@endif
				<li><a href="{{ route('modul') }}" class=""><i class="lnr lnr-upload"></i> <span>Modul Pelajaran</span></a></li>
				@if(auth()->user()->role == 'Admin')
				<li><a href="{{ route('users') }}" class=""><i class="lnr lnr-users"></i> <span>Data Users</span></a></li>
				@endif
			</ul>
		</nav>
	</div>
</div>