<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'nama',
        'jumlah',
        'satuan'
    ];

    public function history()
    {
        return $this->hasMany(HistoryBahanBaku::class, 'bahan_baku_id', 'id');
    }

    public function historymanagement()
    {
        return $this->hasMany(HistoryManagementBahanBaku::class, 'bahan_baku_id', 'id');
    }

    public function resep()
    {
        return $this->hasMany(Resep::class, 'bahan_baku_id', 'id');
    }
}
