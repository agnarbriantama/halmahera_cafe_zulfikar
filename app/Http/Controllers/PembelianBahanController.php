<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanModel;
use App\Models\HistoryBahanModel;
use App\Models\KeuanganModel;

class PembelianBahanController extends Controller
{
    public function index()
    {
        $data = BahanModel::latest()->get();
        return view('keuangan_bahan', compact('data'));
    }

    public function store(Request $request)
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
    
}