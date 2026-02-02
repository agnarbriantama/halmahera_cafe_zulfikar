<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function bahan()
    {
        return view('keuangan_bahan');
    }
    public function gaji()
    {
        return view('gaji');
    }
    public function operasional()
    {
        return view('operasional');
    }
    public function laba_rugi()
    {
        return view('laba_rugi');
    }
}