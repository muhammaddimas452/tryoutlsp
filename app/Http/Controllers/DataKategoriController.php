<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;

class DataKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //function untuk menampilkan semua data kategori
    {
        $kategori = Kategori::all();
        return view('admin.dataKategori', compact('kategori'));
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
    public function store(Request $request) //function untuk menambah kategori
    {   
        $validator = Validator::make($request->all(),[
            "nama_kategori"   => "required",
        ]);
        if($validator->fails())
        {
            return response()->json([
                "status"    => 422,
                "errors"    =>$validator->messages(),
            ]);
        }else{
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('dataKategori')->with('success', 'Data Angket Berhasil Ditambahkan!');
    }
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
    public function edit($id) //function untuk mengarah ke halaman edit kategori
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('admin.editKategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //function untuk mengubah/update data kategori
    {
        $validator = Validator::make($request->all(),[
            "nama_kategori"   => "required",
        ]);
        if($validator->fails())
        {
            return response()->json([
                "status"    => 422,
                "errors"    =>$validator->messages(),
            ]);
        }else{
        $kategori = Kategori::where('id', $id)->first();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('dataKategori')->with('success', 'Data Angket Berhasil Ditambahkan!');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //function untuk menghapus kategori
    {
        $kategori = Kategori::where('id', $id)->first();
        if($kategori){
            if($kategori->delete()){
                return redirect()->route('dataKategori');
            }else{
                return abort('404');
            }
        }else{
            return abort('404');
        }
    }
}
