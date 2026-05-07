<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanModel;
use App\Models\HistoryBahanModel;
use App\Models\KeuanganModel;

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

    public function tambah(Request $request)
    {
        $bahan = BahanModel::findOrFail($request->bahan_id);

        // 1. history bahan
        HistoryBahanModel::create([
            'bahan_id' => $bahan->id,
            'nama_bahan' => $bahan->nama_bahan,
            'type' => 'penambahan',
            'jumlah' => $request->jumlah,
            'satuan' => $bahan->satuan,
            'keterangan' => 'pembelian bahan baku',
        ]);

        // 2. update stok
        $bahan->jumlah_stok += $request->jumlah;
        $bahan->save();

        // 3. keuangan (expense)
        KeuanganModel::create([
            'type' => 'expense',
            'kategori' => 'pembelian bahan',
            'nominal' => $request->nominal,
            'keterangan' => sprintf(
                            'Pembelian %s (%d %s)',
                            $bahan->nama_bahan,
                            $request->jumlah,
                            $bahan->satuan
                            ),
            'bahan_id' => $bahan->id,
        ]);

        return back()->with('success', 'Pembelian berhasil');
    }
    public function pengurangan(Request $request)
    {
        $bahan = BahanModel::findOrFail($request->bahan_id);

        // 1. history bahan
        HistoryBahanModel::create([
            'bahan_id' => $bahan->id,
            'nama_bahan' => $bahan->nama_bahan,
            'type' => 'pengurangan',
            'jumlah' => $request->jumlah,
            'satuan' => $bahan->satuan,
            'keterangan' => $request->keterangan,
        ]);

        // 2. update stok
        $bahan->jumlah_stok -= $request->jumlah;
        $bahan->save();


        return back()->with('success', 'Pengurangan stok berhasil');
    }

    public function history()
    {
        $data = HistoryBahanModel::latest()->get();
        return view('history', compact('data'));
    }
}