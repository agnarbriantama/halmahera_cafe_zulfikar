<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryBahanModel extends Model
{
    protected $table = 'history_bahan';

    protected $fillable = [
        'bahan_id',
        'nama_bahan',
        'type',
        'jumlah',
        'satuan',
        'keterangan',
    ];
}