<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'kode',
        'nama',
        'jumlah',
        'satuan'
    ];

    public function history()
    {
        return $this->hasMany(HistoryProduk::class, 'produk_id', 'id');
    }

    public function historymanagement()
    {
        return $this->hasMany(HistoryManagementProduk::class, 'produk_id', 'id');
    }

    public function resep()
    {
        return $this->hasMany(Resep::class, 'produk_id', 'id');
    }
}
