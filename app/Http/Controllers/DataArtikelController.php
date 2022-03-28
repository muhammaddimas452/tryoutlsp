<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

class DataArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //function untuk melihat semua data artikel
    {   
        $artikel = Artikel::all();
        $kategori = Kategori::get();
        $user = User::get();
       
        return view('admin.dataArtikel', compact('artikel', 'kategori', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //function untuk mengarah ke halaman tambah data
    {
        $kategori = Kategori::all();
        return view('admin.addArtikel', compact( 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //function untuk menambah artikel
    {
        $validator = Validator::make($request->all(),[
            "kategori_id"   => "required",
            "judul_artikel"   => "required",
            "isi_artikel"   => "required",
            "gambar_artikel"   => "required|image"
        ]);
        if($validator->fails())
        {
            return response()->json([
                "status"    => 422,
                "errors"    =>$validator->messages(),
            ]);
        }else{
        $artikel = new Artikel;
        $artikel->user_id = $request->user_id;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->isi_artikel = $request->isi_artikel;
        $artikel->views = 0;
        // $imageName = time().'.'.$request->gambar_artikel->extension();
        // $artikel->gambar_artikel = $request->gambar_artikel->move(public_path('gambar'), $imageName);
        if($request->hasFile('gambar_artikel')){
            $file = $request->file('gambar_artikel');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'.$extension;
            $file->move('gambar/', $filename);
            $artikel->gambar_artikel = 'gambar/'. $filename;
        }
        $artikel->save();
        return redirect()->route('dataArtikel')->with('success', 'Data Angket Berhasil Ditambahkan!');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //function untuk melihat detail artikel
    {
        $artikel = Artikel::where('id', $id)->first();
        $kategori = Kategori::all();
        $user = User::all();
        return view("admin.editArtikel", compact('artikel', 'kategori', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //function untuk mengarah ke halaman edit artikel
    {
        $artikel = Artikel::where('id', $id)->first();
        $kategori = Kategori::all();
        return view("admin.editArtikel", compact('artikel', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //function untuk mengubah/update artikel
    {
        $artikel = Artikel::where('id', $request->id)->first();
        $artikel->user_id = $request->user_id;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->isi_artikel = $request->isi_artikel;
        if($request->hasFile('gambar_artikel')){
            $file = $request->file('gambar_artikel');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'.$extension;
            $file->move('gambar/', $filename);
            $artikel->gambar_artikel = 'gambar/'. $filename;
        }
        $artikel->save();
        return redirect()->route('dataArtikel')->with('success', 'Data Siswa Berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //function untuk menghapus artikel
    {
        $artikel = Artikel::where('id', $id)->first();
        if($artikel){
            if($artikel->delete()){
                return redirect()->route('dataArtikel');
            }else{
                return abort('404');
            }
        }else{
            return abort('404');
        }
    }
}
