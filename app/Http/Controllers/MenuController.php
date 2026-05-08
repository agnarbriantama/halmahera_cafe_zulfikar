<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\KategoriModel;

class MenuController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::latest()->get();
        $data = MenuModel::latest()->get();
        return view('menu', compact('data', 'kategori'));
    }

    public function create(Request $request)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                            ->store('menu', 'public');
        }

        MenuModel::create([
            'kategori_id' => $request->kategori_id,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return back()->with('success', 'Menu berhasil ditambahkan');
    }

    public function update(Request $request, int $id)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                            ->store('menu', 'public');
        }

        $menu = MenuModel::findOrFail($id);

        $menu->update([
            'kategori_id' => $request->kategori_id,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return back()->with('success', 'Menu berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $menu = MenuModel::findOrFail($id);

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus');
    }
}