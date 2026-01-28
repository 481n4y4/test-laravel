<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::get();
        return response()->json($data);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'harga'=>'required',
        ], [
            'nama_barang.required'=>'nama wajib diisi',
            'deskripsi.required'=>'deskripsi wajib diisi',
            'stok.required'=>'stok wajib diisi',
            'harga.required'=>'harga wajib diisi',
        ]);

        $data = Barang::create([
            'nama_barang'=>$request->nama_barang,
            'deskripsi'=>$request->deskripsi,
            'stok'=>$request->stok,
            'harga'=>$request->harga,
        ]);

        return response()->json([
            'message'=>'berhasil tambah barang',
            'data'=>$data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Barang::where('id_barang', $id)->first();
        
        if(!$data) {
            return response()->json([
                'message'=>'barang tidak ditemukan'
            ], 404);
        };
        
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'harga'=>'required',
        ], [
            'nama_barang.required'=>'nama wajib diisi',
            'deskripsi.required'=>'deskripsi wajib diisi',
            'stok.required'=>'stok wajib diisi',
            'harga.required'=>'harga wajib diisi',
        ]);

        $data = Barang::where('id_barang', $id)->first();

        if(!$data) {
            return response()->json([
                'message'=>'barang tidak ditemukan'
            ], 404);
        };

        return response()->json([
            'message'=>'data terperbarui',
            'data'=>$data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Barang::where('id_barang', $id)->first();

        if(!$data) {
            return response()->json([
                'message'=>'barang tidak ditemukan'
            ], 404);
        };

        $data->destroy();

        return response()->json([
            'message'=>'barang terhapus'
        ]);
    }
}
