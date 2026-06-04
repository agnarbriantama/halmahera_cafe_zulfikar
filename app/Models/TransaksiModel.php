<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'nama_customer',
        'metode_pembayaran',
        'subtotal',
        'pajak',
        'service',
        'grand_total',
    ];

    public function details()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}