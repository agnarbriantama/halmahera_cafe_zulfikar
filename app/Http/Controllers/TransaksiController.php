<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\BahanModel;
use App\Models\ResepModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_customer' => 'nullable|string|max:255',
            'metode_pembayaran' => 'required|string',
            'subtotal' => 'required|numeric',
            'pajak' => 'required|numeric',
            'service' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'items' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {

            $transaksi = TransaksiModel::create([
                'kode_transaksi' => $this->generateKodeTransaksi(),
                'user_id' => Auth::id(),
                'nama_customer' => $request->nama_customer,
                'metode_pembayaran' => $request->metode_pembayaran,
                'subtotal' => $request->subtotal,
                'pajak' => $request->pajak,
                'service' => $request->service,
                'grand_total' => $request->grand_total,
            ]);

            foreach ($request->items as $item) {

                $reseps = ResepModel::where('menu_id', $item['menu_id'])->get();

                foreach ($reseps as $resep) {

                    $bahan = BahanModel::find($resep->bahan_id);

                    $kebutuhan = $resep->jumlah * $item['qty'];

                    $stokBaru = $bahan->jumlah_stok - $kebutuhan;

                    if ($stokBaru < $bahan->minimal_stok) {

                        throw new \Exception(
                            "Stok {$bahan->nama_bahan} tidak mencukupi. Stok saat ini {$bahan->jumlah_stok} {$bahan->satuan}, minimal harus tersisa {$bahan->minimal_stok} {$bahan->satuan}."
                        );
                    }
                }
            }

            foreach ($request->items as $item) {

                DetailTransaksiModel::create([
                    'transaksi_id' => $transaksi->id,
                    'menu_id' => $item['menu_id'],
                    'harga' => $item['harga'],
                    'qty' => $item['qty'],
                    'subtotal' => $item['harga'] * $item['qty'],
                ]);

                $reseps = ResepModel::where('menu_id', $item['menu_id'])->get();

                foreach ($reseps as $resep) {

                    $bahan = BahanModel::find($resep->bahan_id);

                    if ($bahan) {

                        $bahan->jumlah_stok -= ($resep->jumlah * $item['qty']);

                        $bahan->save();
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil disimpan',
                'transaksi_id' => $transaksi->id,
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    private function generateKodeTransaksi()
    {
        $tanggal = now()->format('Ymd');

        $last = TransaksiModel::whereDate('created_at', today())
            ->count() + 1;

        return 'TRX-' . $tanggal . '-' . str_pad($last, 4, '0', STR_PAD_LEFT);
    }
}