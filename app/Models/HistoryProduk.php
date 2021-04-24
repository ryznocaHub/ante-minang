<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryProduk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kode',
        'user_id',
        'jumlah',
        'satuan',
        'keterangan',
        'kategori'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
