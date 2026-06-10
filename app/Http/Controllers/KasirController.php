<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\TransaksiModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuModel::with(['kategori','resep.bahan']);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($q2) use ($search) {
                    $q2->where('nama_kategori', 'like', '%' . $search . '%');
                });
            });
        }

         // 🔥 FILTER KATEGORI (BARU)
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        $data = $query->latest()->paginate(1); // 🔥 sementara GET dulu biar simpel

        foreach ($data as $menu) {

            $menu->stok_habis = false;

            foreach ($menu->resep as $resep) {

                if (
                    !$resep->bahan ||
                    ($resep->bahan->jumlah_stok - $resep->jumlah)
                        < $resep->bahan->minimal_stok
                ) {
                    $menu->stok_habis = true;
                    break;
                }
            }
        }
        
        $kategori = KategoriModel::all();

        return view('kasir3', compact('data', 'kategori'));
    }

    public function riwayat()
    {
        $transaksi = TransaksiModel::whereDate('created_at', today())->latest()->paginate(10);
        return view('riwayat_pesanan', compact('transaksi'));
    }

    public function detail(int $id)
    {
        $transaksi = TransaksiModel::with([
            'user',
            'details.menu.kategori'
        ])->findOrFail($id);

        return view('transaksi.detail', compact('transaksi'));
    }

    public function ajaxDetail(int $id)
    {
        $transaksi = TransaksiModel::with([
            'user',
            'details.menu.kategori'
        ])->findOrFail($id);

        return view('transaksi._detail', compact('transaksi'));
    }
}