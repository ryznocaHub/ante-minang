<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah',
        'kategori'
    ];

    public function histoy()
    {
        return $this->hasMany(History::class, 'id_barang', 'id');
    }
}
