<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriMenuController extends Controller
{
    public function index()
    {
        $data = KategoriModel::latest()->get();
        return view('kategori', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        KategoriModel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Kategori menu berhasil ditambahkan');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $kategori = KategoriModel::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Kategori menu berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $kategori = KategoriModel::findOrFail($id);

        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
    
}