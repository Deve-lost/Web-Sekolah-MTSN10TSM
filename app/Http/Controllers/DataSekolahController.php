<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;

class DataSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qSekolah')) {
            $sekolah = Sekolah::where('judul','LIKE','%'.$request->qSekolah.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $sekolah = Sekolah::latest()->simplePaginate(30);
        }

        return view('mtsn10tsm.index', compact('sekolah'));
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
            'judul' => 'required|min:3|max:150|unique:data_sekolah',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);
        
        $post = Sekolah::create([
            'user_id' => auth()->user()->id,
            'nm_kepsek' => $request->nm_kepsek,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $request->image
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/data sekolah/',$request->file('image')->getClientOriginalName());

            $post->image = $request->file('image')->getClientOriginalName();
            $post->save();
        }

        return redirect()->route('data.sekolah')->with('sukses', 'Data Berhasil Ditambahkan');
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
    public function edit(Sekolah $sekolah)
    {
        return view('mtsn10tsm.edit_datasekolah', ['ds' => $sekolah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        // Validasi
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);

        $sekolah->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/data sekolah/',$request->file('image')->getClientOriginalName());

            $sekolah->image = $request->file('image')->getClientOriginalName();
            $sekolah->save();
        }
        return redirect()->route('data.sekolah')->with('sukses', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        unlink('images/data sekolah/'.$sekolah->image);
        $sekolah->delete();

        return redirect()->route('data.sekolah')->with('sukses', 'Data Berhasil Dihapus');
    }

    // Slug
    public function singlepost($slug)
    {
        $ds = Sekolah::where('slug', '=',$slug)->first();

        return view('mtsn10tsm.single_post', compact('ds'));
    }
}
