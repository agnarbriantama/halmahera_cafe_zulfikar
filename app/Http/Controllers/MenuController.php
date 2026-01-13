<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function kategori()
    {
        return view('kategori');
    }
    public function menu()
    {
        return view('menu');
    }
}