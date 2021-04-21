<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryManagementBahanBaku extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'bahan_baku_id',
        'user_id',
        'aksi'
    ];

    public function bahanbaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id', 'id');
    }
}
