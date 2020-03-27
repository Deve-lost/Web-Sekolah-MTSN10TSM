<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->has('qGallery')) {
            $gallery = Gallery::where('caption','LIKE','%'.$request->qGallery.'%')->Simplepaginate(9);
        }else{
            $gallery = Gallery::latest()->simplePaginate(9);
        }

        return view('gallery.index', compact('gallery'));
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
            'caption' => 'required|max:50',
            'image' => 'required',
        ]);

        $gallery = Gallery::create([
            'user_id' => auth()->user()->id,
            'caption' => $request->caption,
            'image' => $request->image
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/gallery/',$request->file('image')->getClientOriginalName());

            $gallery->image = $request->file('image')->getClientOriginalName();
            $gallery->save();
        }

        return redirect('/Gallery/MTSN-10-TSM')->with('sukses','Data Berhasil Ditambahkan');
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
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit_gallery', ['gr' => $gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Validasi
        $this->validate($request, [
            'caption' => 'required|max:50',
            'image' => 'required',
        ]);

        $gallery->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/gallery/',$request->file('image')->getClientOriginalName());

            $gallery->image = $request->file('image')->getClientOriginalName();
            $gallery->save();
        }
        return redirect('/Gallery/MTSN-10-TSM')->with('sukses','Data Berhasil Diperbarui');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        unlink('images/gallery/'.$gallery->image);
        $gallery->delete();

        return redirect('/Gallery/MTSN-10-TSM')->with('sukses','Data Berhasil Dihapus');
    }

    // User Interface
    public function singlepost($slug)
    {
        $gallery = Gallery::where('slug', '=',$slug)->firstOrfail();

        return view('gallery.single_post', compact('gallery'));
    }
}
