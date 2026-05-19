<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\KategoriModel;
use App\Models\ResepModel;
use App\Models\BahanModel;

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
        $menu = MenuModel::findOrFail($id);

        $menu->update([
            'kategori_id' => $request->kategori_id,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Menu berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $menu = MenuModel::findOrFail($id);

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus');
    }

    public function detail(int $id)
    {
        $menu = MenuModel::with(['kategori', 'resep.bahan'])->findOrFail($id);
        $bahan = BahanModel::latest()->get();
        return view('detail_menu', compact('menu', 'bahan'));
    }

     public function createResep(Request $request)
    {
        // $request->validate([
        //     'nama_supplier' => 'required|string|max:255',
        //     'nomor_hp' => 'required|string|max:255',
        // ]);

        ResepModel::create([
            'menu_id' => $request->menu_id,
            'bahan_id' => $request->bahan_id,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return back()->with('success', 'Resep berhasil ditambahkan');
    }

    public function updateResep(Request $request, int $id)
    {
        // $request->validate([
        //     'nama_supplier' => 'required|string|max:255',
        //     'nomor_hp' => 'required|string|max:255',
        // ]);

        $resep = ResepModel::findOrFail($id);

        $resep->update([
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return back()->with('success', 'Resep berhasil diupdate');
    }

    public function destroyResep(int $id)
    {
        $resep = ResepModel::findOrFail($id);

        $resep->delete();

        return back()->with('success', 'Resep berhasil dihapus');
    }
}