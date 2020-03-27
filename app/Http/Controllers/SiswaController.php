<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\BukuInduk;
use App\Mapel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qSiswa')) {
            $siswa = Siswa::where('nis','LIKE','%'.$request->qSiswa.'%')->orWhere('nama_lengkap','LIKE','%'.$request->qSiswa.'%')->orWhere('jenis_kelamin','LIKE','%'.$request->qSiswa.'%')->orWhere('kelas','LIKE','%'.$request->qSiswa.'%')->orWhere('alamat','LIKE','%'.$request->qSiswa.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $siswa = Siswa::latest()->simplePaginate(30);
        }


        return view('siswa.index', compact('siswa'));
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
        // dd($request->all());
        // Validasi
        $this->validate($request, [
            'nis' => 'required|unique:siswa|min:10|max:10',
            'nama_lengkap' => 'required|min:3',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'anak_ke' => 'required',
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'alamat_ortu' => 'required',
        ]);


        // Store Table Buku Iduk
        $bi  = new BukuInduk;
        $bi->nis = $request->nis;
        $bi->nama_lengkap = $request->nama_lengkap;
        $bi->ttl = $request->ttl;
        $bi->jenis_kelamin = $request->jenis_kelamin;
        $bi->agama = $request->agama;
        $bi->avatar = $request->avatar;
        $bi->alamat = $request->alamat;
        $bi->anak_ke = $request->anak_ke;
        $bi->nama_ayah = $request->nama_ayah;
        $bi->pendidikan_ayah = $request->pendidikan_ayah;
        $bi->pekerjaan_ayah = $request->pekerjaan_ayah;
        $bi->penghasilan_ayah = $request->penghasilan_ayah;
        $bi->nama_ibu = $request->nama_ibu;
        $bi->pendidikan_ibu = $request->pendidikan_ibu;
        $bi->pekerjaan_ibu = $request->pekerjaan_ibu;
        $bi->penghasilan_ibu = $request->penghasilan_ibu;
        $bi->alamat_ortu = $request->alamat_ortu;
        $bi->save();

        // Store Table Siswa
        $siswa = Siswa::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/siswa/',$request->file('avatar')->getClientOriginalName());

            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/data-siswa/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');

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
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_lengkap' => 'required|min:3',
        ]);

        $siswa->update($request->all());
        
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/siswa/',$request->file('avatar')->getClientOriginalName());

            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/data-siswa/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        unlink('images/siswa/'.$siswa->avatar);
        $siswa->delete();

        return redirect('/data-siswa/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

    public function profile(Siswa $siswa)
    {
        $matapelajaran = Mapel::all();

        // Data Untuk Chart
        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.profile_siswa', ['siswa' => $siswa, 'mapel' => $matapelajaran, 'categories' => $categories, 'data' => $data]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = Siswa::find($idsiswa);
            if ($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
                return redirect('/profile-siswa/'.$idsiswa.'/MTSN-10-TSM')->with('error','Nilai Mata Pelajaran Sudah Ada');
            }
            
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('/profile-siswa/'.$idsiswa.'/MTSN-10-TSM')->with('sukses','Data Berhasil Dimasukkan');
    }

    public function destroynilai($idsiswa,$idnilai)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idnilai);

        return redirect()->back()->with('sukses','Data Berhasil Dihapus');
    }
}
