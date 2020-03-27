<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qTestimoni')) {
            $testimoni = Testimoni::where('nama','LIKE','%'.$request->qTestimoni.'%')->orWhere('status','LIKE','%'.$request->qTestimoni.'%')->orWhere('lulusan','LIKE','%'.$request->qTestimoni.'%')->orWhere('caption','LIKE','%'.$request->qTestimoni.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $testimoni = Testimoni::latest()->simplePaginate(30);
        }

        return view('testimoni.index', compact('testimoni'));
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
            'nama' => 'required|min:3',
            'status' => 'required',
            'lulusan' => 'required',
            'caption' => 'required|max:191',
            'avatar' => 'required',
        ]);

        $testimoni = Testimoni::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/testimoni/',$request->file('avatar')->getClientOriginalName());

            $testimoni->avatar = $request->file('avatar')->getClientOriginalName();
            $testimoni->save();
        }

        return redirect('/testimoni-alumni/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
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
    public function edit(Testimoni $testimoni)
    {
        return view('testimoni.edit_testimoni', ['ts' => $testimoni]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        // Validasi
        $this->validate($request, [
            'nama' => 'required|min:3',
            'caption' => 'required|max:191',
            'avatar' => 'required'
        ]);

        $testimoni->update($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/testimoni/',$request->file('avatar')->getClientOriginalName());

            $testimoni->avatar = $request->file('avatar')->getClientOriginalName();
            $testimoni->save();
        }

        return redirect('/testimoni-alumni/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        unlink('images/testimoni/'.$testimoni->avatar);
        $testimoni->delete();

        return redirect('/testimoni-alumni/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

}
