<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\HistoryManagementProduk;
use App\Models\Produk;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('resep')->orderByDesc('id')->get();
        $reseps = Resep::with('produk', 'bahanbaku')->get();
        $bahanbakus = BahanBaku::all();

        return view('dashboard.pages.manajemen.produk', compact('produks', 'reseps', 'bahanbakus'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'          => ['required'],
            ]
        );

        if ($request['satuantambah'] == 'select') {
            $satuan = $request->get('satuanSelect');
        } else if ($request['satuantambah'] == 'text') {
            $satuan = $request->get('satuanText');
        }

        dd(count($request->get('bahanbaku')));

        DB::transaction(function () use ($request, $satuan) {
            $produk = Produk::create(
                [
                    'nama'      => $request->get('nama'),
                    'satuan'    => $satuan,
                    'jumlah'    => 0
                ]
            );

            Produk::where('id', $produk->id)->update(
                [
                    'kode'  => 'BJ' . $produk->id
                ]
            );

            $produk = Produk::orderByDesc('id')->first();

            HistoryManagementProduk::create(
                [
                    'kode'      => $produk->kode,
                    'nama'      => $produk->nama,
                    'user_id'   => auth()->user()->id,
                    'aksi'      => 'Tambah'
                ]
            );
            dd($request->get('bahanbaku'));
        });
    }
}
