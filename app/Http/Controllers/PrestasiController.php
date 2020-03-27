<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestasi;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qPrestasi')) {
            $prestasi = Prestasi::where('judul','LIKE','%'.$request->qPrestasi.'%')->Simplepaginate(30);
        }else{
            $prestasi = Prestasi::latest()->simplePaginate(30);
        }

        return view('prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'judul' => 'required|min:3|max:100',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);

        $prestasi = Prestasi::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'deskripsi' => $request->deskripsi,
            'image' => $request->image
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/prestasi/',$request->file('image')->getClientOriginalName());

            $prestasi->image = $request->file('image')->getClientOriginalName();
            $prestasi->save();
        }
           
        return redirect('/Prestasi/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        return view('prestasi.edit_prestasi', ['pres' => $prestasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        // Validasi
        $this->validate($request, [
            'judul' => 'required|min:3|max:100',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);

        $prestasi->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/prestasi/',$request->file('image')->getClientOriginalName());

            $prestasi->image = $request->file('image')->getClientOriginalName();
            $prestasi->save();
        }

        return redirect('/Prestasi/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        unlink('images/prestasi/'.$prestasi->image);
        $prestasi->delete();

        return redirect('/Prestasi/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

    // User Interface
    public function singlepost($slug)
    {
        $prestasi = Prestasi::orderBy('id', 'DESC')->simplePaginate(4);
        $pres = Prestasi::where('slug', '=',$slug)->firstOrfail();

        return view('sites.read_prestasi', compact('pres', 'prestasi'));
    }
}
