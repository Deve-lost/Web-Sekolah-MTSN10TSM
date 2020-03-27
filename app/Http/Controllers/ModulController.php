<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;
use App\File;
use DB;

class ModulController extends Controller
{
 	public function index(Request $request)
 	{
 		if ($request->has('qModul')) {
            $modul = Modul::where('judul','LIKE','%'.$request->qModul.'%')->orderBy('id','DESC')->SimplePaginate(30);
        }else{
            $modul = Modul::latest()->simplePaginate(30);
        }

 		return view('modul.index', compact('modul'));
 	}

 	public function edit(Modul $modul)
 	{
 		return view('modul.edit_modul', ['md' => $modul]);
 	}

 	public function update(Request $request, Modul $modul)
 	{
 		// Validasi
        $this->validate($request, [
            'judul' => 'required',
            'data' => 'required'
        ]);

 		if ($request->hasFile('data')) {
                $request->file('data')->move('files/',$request->file('data')->getClientOriginalName());

                $modul->data = $request->file('data')->getClientOriginalName();
                $modul->save();
            }

 		return redirect('/modul-pelajaran/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
 	}

 	public function store(Request $request)
 	{
 		// Validasi
        $this->validate($request, [
            'judul' => 'required',
            'data' => 'required|file|max:40000',
        ]);

        $modul = Modul::create([
            'judul' => $request->judul,
            'data' => $request->data,
            'user_id' => auth()->user()->id
        ]);

 			if ($request->hasFile('data')) {
                $request->file('data')->move('files/',$request->file('data')->getClientOriginalName());

                $modul->data = $request->file('data')->getClientOriginalName();
                $modul->save();
            }
            
 		return redirect('/modul-pelajaran/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
 	}

 	public function destroy(Modul $modul)
 	{
        unlink('files/'.$modul->data);
 		$modul->delete();

 		return redirect('/modul-pelajaran/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
 	}

    public function download($id)
    {
        $di = File::find($id);
        $download = DB::table('modul')->get();
        
        return Storage::download($di->path, $di->data);
    }
}
