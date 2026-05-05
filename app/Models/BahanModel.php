<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanModel extends Model
{
    protected $table = 'bahan';

    protected $fillable = [
        'nama_bahan',
        'satuan',
        'minimal_stok',
        'jumlah_stok',
    ];
}