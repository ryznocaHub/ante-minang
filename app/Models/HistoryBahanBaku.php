<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBahanBaku extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'bahan_baku_id',
        'user_id',
        'jumlah',
        'keterangan',
        'kategori'
    ];

    public function bahanbaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id', 'id');
    }
}
