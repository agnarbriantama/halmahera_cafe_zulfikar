<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'menu_id',
        'harga',
        'qty',
        'subtotal',
    ];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'transaksi_id');
    }

    public function menu()
    {
        return $this->belongsTo(MenuModel::class, 'menu_id');
    }
}