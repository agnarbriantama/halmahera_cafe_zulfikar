<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanModel;
use App\Models\HistoryBahanModel;

class StokBahanController extends Controller
{
    public function index()
    {
        $data = BahanModel::latest()->get();
        return view('bahan', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'minimal_stok' => 'required|integer|min:0',
        ]);

        BahanModel::create([
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'minimal_stok' => $request->minimal_stok,
            'jumlah_stok' => 0, // default
        ]);

        return back()->with('success', 'Bahan berhasil ditambahkan');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'minimal_stok' => 'required|integer|min:0',
        ]);

        $bahan = BahanModel::findOrFail($id);

        $bahan->update([
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'minimal_stok' => $request->minimal_stok,
        ]);

        return back()->with('success', 'Bahan berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $bahan = BahanModel::findOrFail($id);

        $bahan->delete();

        return back()->with('success', 'Bahan berhasil dihapus');
    }
    public function stok_bahan()
    {
        $data = BahanModel::latest()->get();
        return view('stok', compact('data'));
    }

    public function history()
    {
        $data = HistoryBahanModel::latest()->get();
        return view('history', compact('data'));
    }
}