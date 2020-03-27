<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Post;

class DashboardController extends Controller
{
	public function index()
	{
		$sk = Sekolah::where('id', 1)->first();
		$posts = Post::latest()->paginate(3);
		$kepsek = Sekolah::where('id', 3)->first();

	    return view('dashboard.index', compact('sk','posts','kepsek'));
	}
}
