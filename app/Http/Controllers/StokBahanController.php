<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokBahanController extends Controller
{
    public function index()
    {
        return view('bahan');
    }
    public function stok_bahan()
    {
        return view('stok');
    }
    public function supplier()
    {
        return view('supplier');
    }
    public function history()
    {
        return view('history');
    }
}