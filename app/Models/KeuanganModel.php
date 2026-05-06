<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'type',
        'kategori',
        'nominal',
        'keterangan',
        'bahan_id',
    ];
}