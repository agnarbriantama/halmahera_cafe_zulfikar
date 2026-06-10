<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\BahanModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $penjualanHariIni = TransaksiModel::whereDate('created_at', $today)
            ->sum('grand_total');

        $transaksiHariIni = TransaksiModel::whereDate('created_at', $today)
            ->count();

        $menuTerlaris = DetailTransaksiModel::select(
                'menu_id',
                DB::raw('SUM(qty) as total_terjual')
            )
            ->with('menu')
            ->groupBy('menu_id')
            ->orderByDesc('total_terjual')
            ->first();

        $bahanMenipis = BahanModel::whereColumn(
                'jumlah_stok',
                '<=',
                'minimal_stok'
            )
            ->count();
        
        $listBahanMenipis = BahanModel::whereColumn(
            'jumlah_stok',
            '<=',
            'minimal_stok'
        )->orderBy('jumlah_stok')
        ->get();

        $topMenuTerlaris = DetailTransaksiModel::select(
            'menu_id',
            DB::raw('SUM(qty) as total_terjual')
        )
        ->with('menu')
        ->groupBy('menu_id')
        ->orderByDesc('total_terjual')
        ->limit(5)
        ->get();

        return view('dashboard',compact(
        'penjualanHariIni',
        'transaksiHariIni',
        'menuTerlaris',
        'bahanMenipis',
        'listBahanMenipis',
        'topMenuTerlaris'
    ));
    }
}