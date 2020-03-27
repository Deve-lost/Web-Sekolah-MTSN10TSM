<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qUsers')) {
            $user = User::where('name','LIKE','%'.$request->qUsers.'%')->orWhere('username','LIKE','%'.$request->qUsers.'%')->orWhere('role','LIKE','%'.$request->qUsers.'%')->orderBy('id','DESC')->Simplepaginate(30);
        }else{
            $user = User::latest()->simplePaginate(30);
        }

        return view('users.index', compact('user'));
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
            'name' => 'required|min:3',
            'username' => 'required|min:5|unique:users',
            'role' => 'required',
            // 'avatar' => 'required',
        ]);

        $us = User::create([
            'role' => $request->role,
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt('mtsn10tsm'),
            'avatar' => $request->avatar
        ]);

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/users/',$request->file('avatar')->getClientOriginalName());

            $us->avatar = $request->file('avatar')->getClientOriginalName();
            $us->save();
        }


        return redirect('/Data-Users/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit_users', ['us' => $user]);
    }

    public function editpassword(User $user)
    {
        return view('users.edit_password', ['pw' => $user]);
    }

    public function editpassusers(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('users.edit_password_users', ['pw' => $user]);
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, User $user)
    {
        // Validasi
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:5',
            // 'avatar' => 'required',
        ]);

        $user->update($request->all());

        return redirect('/Data-Users/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');
    }

    public function updateav(Request $request, $id)
    {
        // Validasi
        $this->validate($request, [
            'avatar' => 'required'
        ]);

        $user = User::find($id);
        // unlink('images/users/'.$user->avatar);
        $user->update($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/users/',$request->file('avatar')->getClientOriginalName());

            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }

        return redirect('/Profile-Users/'.$id.'/MTSN-10-TSM')->with('sukses','Foto Profile Berhasil Diganti');

    }

    public function updatepassword(Request $request, $id)
    {
        // Validasi
        $this->validate($request, [
            'password' => 'required|min:5',
        ]);

        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/Data-Users/MTSN-10-TSM')->with('sukses','Password Berhasil Diganti');

    }

    public function updtpassusers(Request $request, $id)
    {
        // Validasi
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:5'
        ]);
        // $messages = [ 'oldPassword.required' => 'Form Tidak Boleh Kosong!', ];

        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPasword;

            if (!Hash::check($oldPassword, Auth::user()->password)) {
                return redirect('/edit-password-users/'.$id.'/MTSN-10-TSM')->with('error','Password Lama Tidak Sesuai');
            }else{
                 $request->user()->fill([
                        'password' => Hash::make($request->newPassword)
                    ])->save();

                return redirect('/Profile-Users/'.$id.'/MTSN-10-TSM')->with('sukses','Password Berhasil Diganti');
            }
    }

    public function resetpw(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt('mtsn10tsm');
        $user->update();

        return redirect('/Data-Users/MTSN-10-TSM')->with('sukses','Password Diperbarui Kedefault');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('Data-Users/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

    public function profile(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('users.profile_user', ['pu' => $user]);
        }

        return redirect()->back();
    }
}
