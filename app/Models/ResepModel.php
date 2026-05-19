<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepModel extends Model
{
    protected $table = 'resep_menu';

    protected $fillable = [
        'menu_id',
        'bahan_id',
        'jumlah',
        'satuan',
    ];

    public function bahan()
    {
        return $this->belongsTo(BahanModel::class);
    }

    public function menu()
    {
        return $this->belongsTo(MenuModel::class);
    }
}