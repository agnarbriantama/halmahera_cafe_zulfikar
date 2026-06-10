<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TransaksiModel;

class KeuanganController extends Controller
{
    public function laporan_harian()
    {
        $tanggalTransaksi = DB::table('transaksi')
        ->selectRaw('DATE(created_at) as tanggal');

        $tanggalKeuangan = DB::table('keuangan')
            ->selectRaw('DATE(created_at) as tanggal');

        $tanggalList = $tanggalTransaksi
            ->union($tanggalKeuangan)
            ->get();

        $laporan = [];

        foreach ($tanggalList as $item) {

            $income = TransaksiModel::whereDate(
                'created_at',
                $item->tanggal
            )->sum('grand_total');

            $expense = KeuanganModel::whereDate(
                'created_at',
                $item->tanggal
            )
            ->where('type', 'expense')
            ->sum('nominal');

            $laporan[] = [
                'tanggal' => $item->tanggal,
                'income' => $income,
                'expense' => $expense,
                'laba' => $income - $expense
            ];
        }

        usort($laporan, function ($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        return view('laporan_harian', compact('laporan'));
    }
    public function detail_harian($tanggal)
    {
        $transaksi = TransaksiModel::whereDate(
        'created_at',
        $tanggal
        )->get();

        $keuangan = KeuanganModel::whereDate(
            'created_at',
            $tanggal
        )->get();

        $income = $transaksi->sum('grand_total');

        $expense = $keuangan
            ->where('type', 'expense')
            ->sum('nominal');

        return view('detail.laporan_harian', compact(
            'tanggal',
            'transaksi',
            'keuangan',
            'income',
            'expense'
        ));
    }
    public function laporan_mingguan()
    {
        $minggu = [];

        $tanggalTransaksi = DB::table('transaksi')
            ->selectRaw('YEAR(created_at) as tahun, WEEK(created_at, 1) as minggu')
            ->groupByRaw('YEAR(created_at), WEEK(created_at, 1)')
            ->get();

        $tanggalKeuangan = DB::table('keuangan')
            ->selectRaw('YEAR(created_at) as tahun, WEEK(created_at, 1) as minggu')
            ->groupByRaw('YEAR(created_at), WEEK(created_at, 1)')
            ->get();

        $periode = $tanggalTransaksi
            ->merge($tanggalKeuangan)
            ->unique(function ($item) {
                return $item->tahun . '-' . $item->minggu;
            });

        foreach ($periode as $item) {

            $income = TransaksiModel::whereYear('created_at', $item->tahun)
                ->whereRaw('WEEK(created_at, 1) = ?', [$item->minggu])
                ->sum('grand_total');

            $expense = KeuanganModel::whereYear('created_at', $item->tahun)
                ->whereRaw('WEEK(created_at, 1) = ?', [$item->minggu])
                ->where('type', 'expense')
                ->sum('nominal');

            $startDate = \Carbon\Carbon::now()
                ->setISODate($item->tahun, $item->minggu)
                ->startOfWeek();

            $endDate = \Carbon\Carbon::now()
                ->setISODate($item->tahun, $item->minggu)
                ->endOfWeek();

            $minggu[] = [
                'tahun' => $item->tahun,
                'minggu' => $item->minggu,
                'start' => $startDate,
                'end' => $endDate,
                'income' => $income,
                'expense' => $expense,
                'laba' => $income - $expense
            ];
        }

        usort($minggu, function ($a, $b) {
            return $b['tahun'] <=> $a['tahun']
                ?: $b['minggu'] <=> $a['minggu'];
        });
        return view('laporan_mingguan', compact('minggu'));
    }
    public function detail_mingguan($tahun, $minggu)
    {
        $startDate = Carbon::now()
        ->setISODate($tahun, $minggu)
        ->startOfWeek();

        $endDate = Carbon::now()
            ->setISODate($tahun, $minggu)
            ->endOfWeek();

        $transaksi = TransaksiModel::whereBetween(
            'created_at',
            [$startDate, $endDate]
        )->get();

        $keuangan = KeuanganModel::whereBetween(
            'created_at',
            [$startDate, $endDate]
        )->get();

        $income = $transaksi->sum('grand_total');

        $expense = $keuangan
            ->where('type', 'expense')
            ->sum('nominal');

        return view('detail.laporan_mingguan', compact(
            'startDate',
            'endDate',
            'transaksi',
            'keuangan',
            'income',
            'expense'
        ));
    }
    public function laporan_bulanan()
    {
         $bulan = [];

        $transaksi = DB::table('transaksi')
            ->selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        $keuangan = DB::table('keuangan')
            ->selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        $periode = $transaksi
            ->merge($keuangan)
            ->unique(function ($item) {
                return $item->tahun . '-' . $item->bulan;
            });

        foreach ($periode as $item) {

            $income = TransaksiModel::whereYear('created_at', $item->tahun)
                ->whereMonth('created_at', $item->bulan)
                ->sum('grand_total');

            $expense = KeuanganModel::whereYear('created_at', $item->tahun)
                ->whereMonth('created_at', $item->bulan)
                ->where('type', 'expense')
                ->sum('nominal');

            $bulan[] = [
                'tahun' => $item->tahun,
                'bulan' => $item->bulan,
                'income' => $income,
                'expense' => $expense,
                'laba' => $income - $expense
            ];
        }

        usort($bulan, function ($a, $b) {
            return $b['tahun'] <=> $a['tahun']
                ?: $b['bulan'] <=> $a['bulan'];
        });
        return view('laporan_bulanan', compact('bulan'));
    }
    public function detail_bulanan($tahun, $bulan)
    {
        $transaksi = TransaksiModel::whereYear(
        'created_at',
        $tahun
        )
        ->whereMonth(
            'created_at',
            $bulan
        )
        ->get();

        $keuangan = KeuanganModel::whereYear(
            'created_at',
            $tahun
        )
        ->whereMonth(
            'created_at',
            $bulan
        )
        ->get();

        $income = $transaksi->sum('grand_total');

        $expense = $keuangan
            ->where('type', 'expense')
            ->sum('nominal');
            
        return view('detail.laporan_bulanan', compact(
            'tahun',
            'bulan',
            'transaksi',
            'keuangan',
            'income',
            'expense'
        ));
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