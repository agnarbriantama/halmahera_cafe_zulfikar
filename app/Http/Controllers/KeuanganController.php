<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganModel;

class KeuanganController extends Controller
{
    public function Laporan_harian()
    {
        return view('laporan_harian');
    }
    public function Laporan_mingguan()
    {
        return view('laporan_mingguan');
    }
    public function Laporan_bulanan()
    {
        return view('laporan_bulanan');
    }
    public function gaji()
    {
        $data = KeuanganModel::where('kategori', 'gaji')->latest()->get();
        return view('gaji', compact('data'));
    }
    public function createGaji(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
        ]);

        KeuanganModel::create([
            'type' => 'expense',
            'kategori' => 'gaji',
            'keterangan' => 'Penggajian '. $request->keterangan,
            'nominal' => $request->nominal,
        ]);

        return back()->with('success', 'Gaji berhasil ditambahkan');
    }
    public function updateGaji(Request $request, int $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
        ]);

        $gaji = KeuanganModel::findOrFail($id);

        $gaji->update([
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
        ]);

        return back()->with('success', 'Gaji berhasil diupdate');
    }

    public function destroyGaji(int $id)
    {
        $bahan = KeuanganModel::findOrFail($id);

        $bahan->delete();

        return back()->with('success', 'Gaji berhasil dihapus');
    }
    public function operasional()
    {
        $data = KeuanganModel::where('kategori', 'operasional')->latest()->get();
        return view('operasional', compact('data'));
    }

    public function createOperasional(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
        ]);

        KeuanganModel::create([
            'type' => 'expense',
            'kategori' => 'operasional',
            'keterangan' => 'Penggajian '. $request->keterangan,
            'nominal' => $request->nominal,
        ]);

        return back()->with('success', 'Operasional berhasil ditambahkan');
    }
    public function updateOperasional(Request $request, int $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
        ]);

        $gaji = KeuanganModel::findOrFail($id);

        $gaji->update([
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
        ]);

        return back()->with('success', 'Operasional berhasil diupdate');
    }

    public function destroyOperasional(int $id)
    {
        $bahan = KeuanganModel::findOrFail($id);

        $bahan->delete();

        return back()->with('success', 'Operasional berhasil dihapus');
    }

    public function laba_rugi()
    {
        return view('laba_rugi');
    }
}