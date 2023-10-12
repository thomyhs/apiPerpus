<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugasData = Petugas::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Petugas",
            "data" => $petugasData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Petugas::create([
            "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
            "alamat_petugas" => $request->alamat_petugas
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Membuat Petugas",
        ],400);

        return response()->json([
            "Message" => "Berhasil Membuat Petugas",
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
        $data = Petugas::findOrFail($request->id);
        $updatedData = $data->update([
            "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
            "alamat_petugas" => $request->alamat_petugas
        ]);

        if(!$updatedData) return response()->json([
            "Message" => "Gagal Mengupdate Petugas",
        ],400);

        return response()->json([
            "Message" => "Berhasil Mengupdate Petugas",
            "data" => $updatedData
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataToDelete = Petugas::findOrFail($id);
        $deleteProced = $dataToDelete->delete();

        if(!$deleteProced) return response()->json([
             "Message" => "Gagal Menghapus Data!"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data!"
        ],200);
    }
}
