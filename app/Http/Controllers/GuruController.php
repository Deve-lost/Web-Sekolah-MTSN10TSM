<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;
use App\Mapel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qGuru')) {
            $guru = Guru::where('nig','LIKE','%'.$request->qGuru.'%')->orWhere('nama_lengkap','LIKE','%'.$request->qGuru.'%')->orWhere('jenis_kelamin','LIKE','%'.$request->qGuru.'%')->orWhere('telepon','LIKE','%'.$request->qGuru.'%')->orWhere('jabatan','LIKE','%'.$request->qGuru.'%')->orWhere('alamat','LIKE','%'.$request->qGuru.'%')->orderBy('id','DESC')->SimplePaginate(30);
        }else{
            $guru = Guru::latest()->simplePaginate(30);
        }
        
        $mapel = Mapel::all();

        return view('guru.index', compact('guru','mapel'));
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
            'nig' => 'required|unique:guru|min:16|max:16',
            'nama_lengkap' => 'required|min:3',
            'username' => 'required|min:5|unique:users',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'telepon' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);
        
        // Store Table User
        $user  = new User;
        $user->role = 'Guru';
        $user->name = $request->nama_lengkap;
        $user->username = $request->username;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        // Store Table Guru
        $request->request->add(['user_id' => $user->id]);
        $guru = Guru::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/guru/',$request->file('avatar')->getClientOriginalName());

            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }

        return redirect('/data-guru/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
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
    public function edit(Guru $guru)
    {
        return view('guru.edit_guru', ['guru' => $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi
        $this->validate($request, [
            'nig' => 'required|min:16|max:16',
            'nama_lengkap' => 'required|min:3',

        ]);

        $guru->update($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/guru/',$request->file('avatar')->getClientOriginalName());

            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('data-guru/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        unlink('images/guru/'.$guru->avatar);
        $guru->delete();

        return redirect('data-guru/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

    public function profile(Guru $guru)
    {
        return view('guru.profile_guru', ['guru' => $guru]);
    }
}
