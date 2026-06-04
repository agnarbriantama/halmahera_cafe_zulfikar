<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\TransaksiModel;

class KasirController extends Controller
{
    public function index()
    {
        $data = MenuModel::with(['kategori'])->latest()->get();
        return view('kasir3', compact('data'));
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