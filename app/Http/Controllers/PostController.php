<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('qPublish')) {
            $posts = Post::where('title','LIKE','%'.$request->qPublish.'%')->orWhere('kategori','LIKE','%'.$request->qPublish.'%')->Simplepaginate(30);
        }else{
            $posts = Post::latest()->simplePaginate(30);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create_publish');
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
            'title' => 'required|min:5|max:150|unique:posts',
            'kategori' => 'required',
            'content' => 'required',
        ]);
        
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'kategori' => $request->kategori,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail
        ]);

        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('images/post/',$request->file('thumbnail')->getClientOriginalName());

            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->save();
        }

        return redirect()->route('publish')->with('sukses', 'Data Berhasil Ditambahkan');
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
    public function edit(Post $post)
    {
        return view('posts.edit_post', ['ps' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validasi
        $this->validate($request, [
            'title' => 'required|min:5',
            'kategori' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
        ]);

        $post->update($request->all());

        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('images/post/',$request->file('thumbnail')->getClientOriginalName());

            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->save();
        }
        return redirect()->route('publish')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        unlink('images/post/'.$post->thumbnail);
        $post->delete();

        return redirect()->back()->with('sukses','Data Berhasil Dihapus');
    }
}
