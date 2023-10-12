<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rakData = Rak::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Rak",
            "data" => $rakData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Rak::create([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Membuat Rak",
        ],400);

        return response()->json([
            "Message" => "Berhasil Membuat Rak",
            "Data" => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $data = Rak::findOrFail($request->id);
        $updatedData = $data->update([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id
        ]);

        if(!$updatedData) return response()->json([
            "Message" => "Gagal Mengupdate Rak",
        ],400);

        return response()->json([
            "Message" => "Berhasil Mengupdate Rak",
            "data" => $updatedData
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataToDelete = Rak::findOrFail($id);
        $deleteProced = $dataToDelete->delete();

        if(!$deleteProced) return response()->json([
             "Message" => "Gagal Menghapus Data!"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data!"
        ],200);
    }
}
