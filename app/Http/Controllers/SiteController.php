<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sekolah;
use App\Prestasi;
use App\Gallery;
use App\Modul;
use App\HomeSlide;
use App\Testimoni;

class SiteController extends Controller
{
	public function index()
	{
		$hms = HomeSlide::latest()->simplePaginate(10);
		$posts = Post::latest()->simplePaginate(4);
		$prestasi = Prestasi::latest()->SimplePaginate(3);
		$kepsek = Sekolah::where('id', 3)->first();
		$testimoni = Testimoni::latest()->simplePaginate(5);

		return view('home', compact('hms','prestasi','posts', 'kepsek', 'testimoni'));
	}

	public function profilesekolah()
	{
		$sk = Sekolah::where('id', 1)->first();

		return view('sites.profile_sekolah', compact('sk'));
	}

	public function visimisi()
	{
		$sk = Sekolah::where('id', 2)->first();

		return view('sites.visi_misi', compact('sk'));
	}

	public function beritapengumuman(Request $request)
	{
		if ($request->has('cBerita')) {
            $posts = Post::where('title','LIKE','%'.$request->cBerita.'%')->orWhere('kategori','LIKE','%'.$request->cBerita.'%')->Simplepaginate(10);
        }else{
			$posts = Post::orderBy('id', 'DESC')->simplePaginate(10);
		}

		return view('sites.berita', compact('posts'));
	}

	public function prestasi(Request $request)
	{
		if ($request->has('cPrestasi')) {
            $prestasi = prestasi::where('judul','LIKE','%'.$request->cPrestasi.'%')->Simplepaginate(12);
        }else{
			$prestasi = Prestasi::orderBy('id', 'DESC')->simplePaginate(12);
		}

		return view('sites.prestasi', compact('prestasi'));
	}

	public function gallery()
	{
		$gallery = Gallery::orderBy('id', 'DESC')->simplePaginate(16);
		
		return view('sites.gallery', compact('gallery'));
	}

	public function modul()
	{
		$modul = Modul::orderBy('id', 'DESC')->paginate(30);

		return view('sites.modul_pelajaran', compact('modul'));
	}

	public function kontak()
	{
		return view('sites.kontak');
	}

	// Slug
    public function singlepost($slug)
    {
    	$berita = Post::orderBy('id', 'DESC')->paginate(4);
    	$post = Post::where('slug', '=',$slug)->first();

    	return view('sites.read_bp', compact('post', 'berita'));
    }
}
