<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = [
            [
                'kode_barang' => 'BB',
                'nama_barang'   => 'Singkong',
                'jumlah'    => 0,
                'kategori'  => 'Bahan Baku'
            ],
            [
                'kode_barang' => 'PS',
                'nama_barang'   => 'Biji Plastik',
                'jumlah'    => 0,
                'kategori'  => 'Barang Jadi'
            ],
            [
                'kode_barang' => 'BJ',
                'nama_barang'   => 'Kripik Sanjai',
                'jumlah'    => 0,
                'kategori'  => 'Produk'
            ],
            [
                'kode_barang' => 'PS',
                'nama_barang'   => 'Plastik',
                'jumlah'    => 0,
                'kategori'  => 'Barang Jadi'
            ],
        ];

        foreach ($barang as $key => $value) {
            Barang::create($value);
        }
    }
}
