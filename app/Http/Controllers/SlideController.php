<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeSlide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hms = HomeSlide::orderBy('id','DESC')->simplePaginate(20);

        return view('slider.index', compact('hms'));
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
            'title' => 'required|min:5|max:100|unique:slide',
            'quotes' => 'max:300',
            'image' => 'required',
        ]);
        
        $slide = HomeSlide::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'quotes' => $request->quotes,
            'image' => $request->image
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/hero slide/',$request->file('image')->getClientOriginalName());

            $slide->image = $request->file('image')->getClientOriginalName();
            $slide->save();
        }

        return redirect()->route('home.slide')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlide $HomeSlide)
    {
        return view('slider.edit_slide', ['hs'=>$HomeSlide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlide $HomeSlide)
    {
        // Validasi
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'quotes' => 'max:300',
            'image' => 'required',
        ]);

        $HomeSlide->Update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/hero slide/',$request->file('image')->getClientOriginalName());

            $HomeSlide->image = $request->file('image')->getClientOriginalName();
            $HomeSlide->save();
        }

        return redirect()->route('home.slide')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlide $HomeSlide)
    {
        unlink('images/hero slide/'.$HomeSlide->image);
        $HomeSlide->delete();

        return redirect()->route('home.slide')->with('sukses','Data Berhasil Dihapus');
    }
}
