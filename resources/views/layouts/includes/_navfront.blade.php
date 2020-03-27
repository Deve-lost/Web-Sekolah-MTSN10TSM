<nav class="navbar navbar-expand-lg bg-darks">
  <a class="navbar-brand" href="/"><img src="{{asset('frontend/img/brand.png')}}" width="100" height="20" alt="MTSN 10 TSM Logo" class="img-responsive logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""><i class="fa fa-bars"></i></span>
  </button>

    <div class="collapse navbar-collapse sentuh" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
		        <a class="nav-link" href="/" style="color: #f6783a;">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #f6783a;">
		          Profile Sekolah
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{ route('prof.sekolah') }}">MTSN 10 Tasikmalaya</a>
		          <a class="dropdown-item" href="{{ route('visi.misi') }}">Visi Misi</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="{{ route('site.prestasi') }}">Prestasi</a>
		          <a class="dropdown-item" href="{{ route('site.gallery') }}">Gallery</a>
		          <a class="dropdown-item" href="{{ route('site.modul') }}">Modul Pelajaran</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" style="color: #f6783a;" href="{{ route('berita.pengumuman') }}">Berita Dan Pengumuman</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{ route('site.kontak') }}" style="color: #f6783a;">Kontak</a>
		      </li>
	      </ul>
	    <span class="navbar-text" style="color: #f6783a;">
	      	<div class="social pt-1">
				<a href="mailto:mtsnsingaparnaku@gmail.com"><i class="fa fa-envelope"></i></a>
			</div>
	    </span>
 	</div>
</nav>