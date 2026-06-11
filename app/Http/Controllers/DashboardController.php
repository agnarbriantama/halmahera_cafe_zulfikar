<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\BahanModel;
use App\Models\KeuanganModel;
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

        // grafik 
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = now()->subDays($i);

            $labels[] = $tanggal->translatedFormat('D');

            $incomeData[] = TransaksiModel::whereDate(
                'created_at',
                $tanggal
            )->sum('grand_total');

            $expenseData[] = KeuanganModel::whereDate(
                'created_at',
                $tanggal
            )
            ->where('type', 'expense')
            ->sum('nominal');
        }

        return view('dashboard',compact(
        'penjualanHariIni',
        'transaksiHariIni',
        'menuTerlaris',
        'bahanMenipis',
        'listBahanMenipis',
        'topMenuTerlaris',
        'labels',
        'incomeData',
        'expenseData'
    ));
    }
}