<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuInduk;

class BukuIndukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('qBi')) {
            $bi = BukuInduk::where('nis','LIKE','%'.$request->qBi.'%')->orWhere('nama_lengkap','LIKE','%'.$request->qBi.'%')->orWhere('jenis_kelamin','LIKE','%'.$request->qBi.'%')->orWhere('ttl','LIKE','%'.$request->qBi.'%')->orWhere('alamat','LIKE','%'.$request->qBi.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $bi = BukuInduk::latest()->simplePaginate(30);
        }

    	return view('bukuinduk.index', compact('bi'));
    }

    public function profile(BukuInduk $bukuinduk)
    {
    	return view('bukuinduk.profile_bi', ['bi' => $bukuinduk]);
    }

    public function edit(BukuInduk $bukuinduk)
    {
    	return view('bukuinduk.edit_bi', ['bi' => $bukuinduk]);
    }

    public function update(Request $request, BukuInduk $bukuinduk)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_lengkap' => 'required|min:3'
        ]);

        $bukuinduk->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());

            $bukuinduk->avatar = $request->file('avatar')->getClientOriginalName();
            $bukuinduk->save();
        }

        return redirect('/data-buku-induk/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy(BukuInduk $bukuinduk)
    {
        $bukuinduk->delete();

        return redirect('/data-buku-induk/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }
}
