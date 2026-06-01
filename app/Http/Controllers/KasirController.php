<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class KasirController extends Controller
{
    public function index()
    {
        $data = MenuModel::with(['kategori'])->latest()->get();
        return view('kasir3', compact('data'));
    }
}