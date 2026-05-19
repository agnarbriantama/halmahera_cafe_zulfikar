<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'kategori_id',
        'nama_menu',
        'harga',
        'deskripsi',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class);
    }

    public function resep()
    {
        return $this->hasMany(ResepModel::class, 'menu_id');
    }
}