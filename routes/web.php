<?php

Route::get('/','SiteController@index');

/*
|--------------------------------------------------------------------------
| Halaman User Interface
|--------------------------------------------------------------------------
|
| Halaman User Interface Menggunakan Template Dari Unica
|
*/

// Sites
Route::get('/profile-sekolah', [
		'uses' => 'SiteController@profilesekolah',
		'as' => 'prof.sekolah'
	]);

Route::get('/visi-misi', [
		'uses' => 'SiteController@visimisi',
		'as' => 'visi.misi'
	]);

Route::get('/berita-dan-pengumuman', [
		'uses' => 'SiteController@beritapengumuman',
		'as' => 'berita.pengumuman'
	]);

Route::get('/prestasi', [
		'uses' => 'SiteController@prestasi',
		'as' => 'site.prestasi'
	]);

Route::get('/gallery', [
		'uses' => 'SiteController@gallery',
		'as' => 'site.gallery'
	]);

Route::get('/modul-pelajaran', [
	'uses' => 'SiteController@modul',
	'as' => 'site.modul'
]);

Route::get('/kontak', [
	'uses' => 'SiteController@kontak',
	'as' => 'site.kontak'
]);

/*
|--------------------------------------------------------------------------
| Halaman Admin
|--------------------------------------------------------------------------
|
| Halaman Admin Menggunakan Template klorofil
|
*/

// Auth
Route::get('/Auth-MTSN-10-TSM','AuthController@index')->name('login');
Route::post('/Auth-MTSN-10-TSM','AuthController@postlogin')->name('post.login');
Route::get('/Logout-MTSN-10-TSM','AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:Admin']], function(){
	// Home Slide
	Route::get('/home-slide/MTSN-10-TSM', [
		'uses' => 'SlideController@index',
		'as' => 'home.slide'
	]);

	Route::post('/store-slide/MTSN-10-TSM', [
		'uses' => 'SlideController@store',
		'as' => 'store.slide'
	]);

	Route::get('/edit-slide/{HomeSlide}/MTSN-10-TSM', [
		'uses' => 'SlideController@edit',
		'as' => 'edit.slide'
	]);

	Route::post('/update-slide/{HomeSlide}/MTSN-10-TSM', [
		'uses' => 'SlideController@update',
		'as' => 'update.slide'
	]);

	Route::get('/destroy-slide/{HomeSlide}/MTSN-10-TSM', [
		'uses' => 'SlideController@destroy',
		'as' => 'destroy.slide'
	]);

	// Data Sekolah
	Route::get('/Data-Sekolah/MTSN-10-TSM', [
		'uses' => 'DataSekolahController@index',
		'as' => 'data.sekolah'
	]);

	Route::post('/Data-Sekolah/MTSN-10-TSM', [
		'uses' => 'DataSekolahController@store',
		'as' => 'store.sekolah'
	]);

	Route::get('/Edit-Data-Sekolah/{sekolah}/MTSN-10-TSM', [
		'uses' => 'DataSekolahController@edit',
		'as' => 'edit.ds'
	]);

	Route::post('/Update-Data-Sekolah/{sekolah}/MTSN-10-TSM', [
		'uses' => 'DataSekolahController@update',
		'as' => 'update.ds'
	]);

	Route::get('/Destroy-Data-Sekolah/{sekolah}/MTSN-10-TSM', [
		'uses' => 'DataSekolahController@destroy',
		'as' => 'destroy.ds'
	]);

	// Profile Sekolah
	Route::get('/Profile-Sekolah/MTSN-10-TSM', [
		'uses' => 'ProfileSekolahController@index',
		'as' => 'profile.sekolah'
	]);

	Route::post('/Store-Profile-Sekolah/MTSN-10-TSM', [
		'uses' => 'ProfileSekolahController@store',
		'as' => 'profsekolah.store'
	]);

	// Guru
	Route::get('/edit-guru/{guru}/MTSN-10-TSM','GuruController@edit')->name('edit.guru');
	Route::post('/store-guru/MTSN-10-TSM','GuruController@store')->name('store.guru');
	Route::post('/update-guru/{guru}/MTSN-10-TSM','GuruController@update');
	Route::get('/destroy-guru/{guru}/MTSN-10-TSM','GuruController@destroy');

	// Siswa
	Route::get('/edit-siswa/{siswa}/MTSN-10-TSM','SiswaController@edit');
	Route::post('/store-siswa/MTSN-10-TSM','SiswaController@store');
	Route::post('/update-siswa/{siswa}/MTSN-10-TSM','SiswaController@update');
	Route::get('/destroy-siswa/{siswa}/MTSN-10-TSM','SiswaController@destroy');

	// Buku Induk
	Route::get('/edit-buku-induk/{bukuinduk}/MTSN-10-TSM','BukuIndukController@edit');
	Route::get('/destroy-buku-induk/{bukuinduk}/MTSN-10-TSM','BukuIndukController@destroy');
	Route::post('/update-buku-induk/{bukuinduk}/MTSN-10-TSM','BukuIndukController@update');

	// Mapel
	Route::get('/data-mapel/MTSN-10-TSM','MapelController@index')->name('data.mapel');
	Route::post('/store-mapel/MTSN-10-TSM','MapelController@store');
	Route::get('/edit-mapel/{mapel}/MTSN-10-TSM','MapelController@edit');
	Route::post('/update-mapel/{mapel}/MTSN-10-TSM','MapelController@update');
	Route::get('/destroy-mapel/{mapel}/MTSN-10-TSM','MapelController@destroy');


	// Testimoni Alumni
	Route::get('/testimoni-alumni/MTSN-10-TSM','TestimoniController@index')->name('testimoni');
	Route::post('/store-testimoni/MTSN-10-TSM','TestimoniController@store');
	Route::get('/edit-testimoni/{testimoni}/MTSN-10-TSM','TestimoniController@edit');
	Route::post('/update-testimoni/{testimoni}/MTSN-10-TSM','TestimoniController@update');
	Route::get('/destroy-testimoni/{testimoni}/MTSN-10-TSM','TestimoniController@destroy');

	//Publish
	Route::get('/Publish/MTSN-10-TSM','PostController@index')->name('publish');
	
	Route::get('/publish-create/MTSN-10-TSM', [
		'uses' => 'PostController@create',
		'as' => 'post.create'
	]);

	Route::post('/publish-store/MTSN-10-TSM', [
		'uses' => 'PostController@store',
		'as' => 'post.store'
	]);

	Route::get('/publish-edit/{post}/MTSN-10-TSM', [
		'uses' => 'PostController@edit',
		'as' => 'post.edit'
	]);

	Route::post('/publish-update/{post}/MTSN-10-TSM', [
		'uses' => 'PostController@update',
		'as' => 'post.update'
	]);

	Route::get('/publish-destroy/{post}/MTSN-10-TSM', [
		'uses' => 'PostController@destroy',
		'as' => 'post.destroy'
	]);


	// Prestasi
	Route::get('/Prestasi/MTSN-10-TSM','PrestasiController@index')->name('prestasi');
	Route::post('/store-prestasi/MTSN-10-TSM','PrestasiController@store');
	Route::get('/edit-prestasi/{prestasi}/MTSN-10-TSM','PrestasiController@edit');
	Route::post('/update-prestasi/{prestasi}/MTSN-10-TSM','PrestasiController@update');
	Route::get('/destroy-prestasi/{prestasi}/MTSN-10-TSM','PrestasiController@destroy');

	// Gallery
	Route::get('/Gallery/MTSN-10-TSM','GalleryController@index')->name('gallery');
	Route::post('/store-gallery/MTSN-10-TSM','GalleryController@store');
	Route::get('/edit-gallery/{gallery}/MTSN-10-TSM','GalleryController@edit')->name('edit.gallery');
	Route::post('/update-gallery/{gallery}/MTSN-10-TSM','GalleryController@update');
	Route::get('/destroy-gallery/{gallery}/MTSN-10-TSM','GalleryController@destroy');
	
	// Data User
	Route::get('/Data-Users/MTSN-10-TSM','UserController@index')->name('users');
	Route::post('/store-users/MTSN-10-TSM','UserController@store');
	Route::get('/edit-users/{user}/MTSN-10-TSM','UserController@edit');
	Route::get('/edit-password/{user}/MTSN-10-TSM','UserController@editpassword');
	Route::post('/update-users/{user}/MTSN-10-TSM','UserController@update');
	Route::post('/update-password/{id}/MTSN-10-TSM','UserController@updatepassword');
	Route::get('/reset-password/{user}/MTSN-10-TSM','UserController@resetpw');
	Route::get('/destroy-users/{user}/MTSN-10-TSM','UserController@destroy');

});

Route::group(['middleware' => ['auth', 'checkRole:Admin,Guru']], function(){
	// Dashboard
	Route::get('/Dashboard/MTSN-10-TSM','DashboardController@index')->name('dashboard');

	// Guru
	Route::get('/data-guru/MTSN-10-TSM','GuruController@index')->name('data.guru');
	Route::get('/profile-guru/{guru}/MTSN-10-TSM','GuruController@profile')->name('guru.profile');

	// Siswa
	Route::get('/data-siswa/MTSN-10-TSM','SiswaController@index')->name('data.siswa');
	Route::get('/profile-siswa/{siswa}/MTSN-10-TSM','SiswaController@profile');
	Route::post('/add-nilai-siswa/{id}/MTSN-10-TSM','SiswaController@addnilai');
	Route::get('/destroy-siswa/{id}/{idmapel}','SiswaController@destroynilai');
	
	// Buku Induk
	Route::get('/data-buku-induk/MTSN-10-TSM','BukuIndukController@index')->name('bukuinduk');
	Route::get('/buku-induk/{bukuinduk}/MTSN-10-TSM','BukuIndukController@profile')->name('profile.bi');
	
	// Modul
	Route::get('/modul-pelajaran/MTSN-10-TSM','ModulController@index')->name('modul');
	Route::post('/store-modul/MTSN-10-TSM','ModulController@store');
	Route::get('/edit-modul/{modul}/MTSN-10-TSM','ModulController@edit');
	Route::post('/update-modul/{modul}/MTSN-10-TSM','ModulController@update');
	Route::get('/destroy-modul/{modul}/MTSN-10-TSM','ModulController@destroy');
	Route::get('/download-modul/{id}/MTSN-10-TSM','ModulController@download')->name('download');

	// User
	Route::get('/Profile-Users/{user}/MTSN-10-TSM','UserController@profile');
	Route::get('/edit-avatar/{user}/MTSN-10-TSM','UserController@editav');
	Route::post('/update-avatar/{id}/MTSN-10-TSM','UserController@updateav');
	Route::get('/edit-password-users/{user}/MTSN-10-TSM','UserController@editpassusers');
	Route::post('/update-password-users/{id}/MTSN-10-TSM','UserController@updtpassusers');
	
});

// Data Sekolah
Route::get('/{slug}/data-sekolah', [
	'uses' => 'DataSekolahController@singlepost',
	'as' => 'sekolah.single.post'
]);

// Publish
Route::get('/{slug}/post', [
	'uses' => 'SiteController@singlepost',
	'as' => 'site.single.post'
]);

// Prestasi
Route::get('/{slug}/prestasi', [
	'uses' => 'PrestasiController@singlepost',
	'as' => 'prestasi.single.post'
]);

// Gallery
Route::get('/{slug}/gallery', [
	'uses' => 'GalleryController@singlepost',
	'as' => 'gallery.single.post'
]);

