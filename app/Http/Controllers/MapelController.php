<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gurus = Guru::all();

        if ($request->has('qMapel')) {
            $mapel = Mapel::where('kode','LIKE','%'.$request->qMapel.'%')->orWhere('nama','LIKE','%'.$request->qMapel.'%')->orWhere('semester','LIKE','%'.$request->qMapel.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $mapel = Mapel::latest()->simplePaginate(30);
        }

        return view('mapel.index', compact('gurus','mapel'));
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
            'kode' => 'required|unique:mapel',
            'nama' => 'required'
        ]);

        $mapel = Mapel::create($request->all());

        return redirect('/data-mapel/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
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
    public function edit(Mapel $mapel)
    {
        $guru = Guru::all();

        return view('mapel.edit_mapel', ['mp' => $mapel, 'guru' => $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel->update($request->all());

        return redirect('/data-mapel/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect('/data-mapel/MTSN-10-TSM')->with('sukses', 'Data Berhasil Dihapus');
    }
}
