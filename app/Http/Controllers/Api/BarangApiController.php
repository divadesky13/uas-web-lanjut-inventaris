<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangApiController extends Controller
{
    /**
     * Menampilkan semua data barang (GET)
     */
    public function index()
    {
        $barangs = Barang::all();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data barang berhasil diambil',
            'data'    => $barangs
        ], 200);
    }

    /**
     * Menambahkan data barang baru (POST)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Barang berhasil ditambahkan',
            'data'    => $barang
        ], 201);
    }

    /**
     * Menampilkan detail satu barang berdasarkan ID (GET)
     */
    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Barang tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Detail barang ditemukan',
            'data'    => $barang
        ], 200);
    }

    /**
     * Mengubah data barang berdasarkan ID (PUT/PATCH)
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Barang tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        $barang->update($request->all());

        return response()->json([
            'status'  => 'success',
            'message' => 'Barang berhasil diperbarui',
            'data'    => $barang
        ], 200);
    }

    /**
     * Menghapus data barang berdasarkan ID (DELETE)
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Barang tidak ditemukan'
            ], 404);
        }

        $barang->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Barang berhasil dihapus'
        ], 200);
    }
}