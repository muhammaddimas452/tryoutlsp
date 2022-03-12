<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::with('kategori', 'user','kategori')->get();
        $kategori = Kategori::get();
        $user = User::get();
        $terbaru = Artikel::orderBy("created_at", "desc")->paginate(3);
        $baca = Artikel::orderBy("views", "desc")->paginate(3);
        return view("beranda", compact('artikel', 'kategori', 'user', 'terbaru', 'baca'));
    }

    public function artikel()
    {
        $artikel = Artikel::all();
        $kategori = Kategori::get();
        $user = User::get();
        $artikels = Artikel::paginate(5);
        $baca = Artikel::orderBy("views", "desc")->paginate(3);
        return view("artikel", compact('artikel', 'kategori', 'user', 'artikels', 'baca'));
    }

    // public function detailArtikel()
    // {
    //     return view("detailArtikel");
    // }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        $kategori = Kategori::all();
        $user = User::all();
        $baca = Artikel::where('id', $id)->value('views');
        if($artikel){
            $artikeledit = Artikel::where('id', $id)->first();
            $artikeledit->kategori_id = $artikeledit->kategori_id;
            $artikeledit->user_id = $artikeledit->user_id;
            $artikeledit->judul_artikel = $artikeledit->judul_artikel;
            $artikeledit->isi_artikel = $artikeledit->isi_artikel;
            $artikeledit->gambar_artikel = $artikeledit->gambar_artikel;
            $artikeledit->views = $baca + 1;
            $artikeledit->save();    
        return view("detailArtikel", compact('artikel', 'kategori', 'user', 'baca'));
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
