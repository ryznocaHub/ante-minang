<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryManagementProduk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'produk_id',
        'user_id',
        'aksi'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
