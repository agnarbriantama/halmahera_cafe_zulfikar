<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    public function index()
    {
        $data = SupplierModel::latest()->get();
        return view('supplier', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        SupplierModel::create([
            'nama_supplier' => $request->nama_supplier,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return back()->with('success', 'Supplier berhasil ditambahkan');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        $supplier = SupplierModel::findOrFail($id);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return back()->with('success', 'Supplier berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $supplier = SupplierModel::findOrFail($id);

        $supplier->delete();

        return back()->with('success', 'Supplier berhasil dihapus');
    }
}

