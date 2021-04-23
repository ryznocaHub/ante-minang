<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\HistoryManagementProduk;
use App\Models\HistoryProduk;
use App\Models\Produk;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
                'nama'          => ['required', Rule::unique('produks', 'nama')],
            ]
        );

        if ($request['satuantambah'] == 'select') {
            $satuan = $request->get('satuanSelect');
        } else if ($request['satuantambah'] == 'text') {
            $request->validate(
                [
                    'satuanText'    => ['required']
                ]
            );
            $satuan = $request->get('satuanText');
        }

        $bahanBaku = array_unique($request->get('bahanbaku'));

        DB::transaction(function () use ($request, $satuan, $bahanBaku) {
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

            foreach ($bahanBaku as $key => $value) {
                Resep::create(
                    [
                        'produk_id'     => $produk->id,
                        'bahan_baku_id' => $value,
                        'jumlah'        => $request->get('jumlah')[$key]
                    ]
                );
            }

            HistoryManagementProduk::create(
                [
                    'kode'      => $produk->kode,
                    'nama'      => $produk->nama,
                    'user_id'   => auth()->user()->id,
                    'aksi'      => 'Tambah'
                ]
            );
        });

        return redirect()->route('produk.index')->with('status', 'Produk berhasil ditambah');
    }

    public function destroy(Request $request)
    {
        $produk = Produk::where('id', $request->get('id'))->first();

        HistoryManagementProduk::create(
            [
                'kode'          => $produk->kode,
                'nama'          => $produk->nama,
                'user_id'       => auth()->user()->id,
                'aksi'          => 'Hapus'
            ]
        );

        Produk::where('id', $request->get('id'))->delete();

        return redirect()->route('produk.index')->with('status', 'Produk berhasil dihapus');
    }

    public function masuk()
    {
        $histories = HistoryProduk::with('user')
            ->where('kategori', 'Masuk')
            ->orderByDesc('tanggal')->get();
        $kategori = 1;
        $jenis = 2;

        return view('dashboard.pages.history.stok', compact('histories', 'kategori', 'jenis'));
    }

    public function keluar()
    {
        $histories = HistoryProduk::with('user')
            ->where('kategori', 'Keluar')
            ->orderByDesc('tanggal')->get();
        $kategori = 2;
        $jenis = 2;

        return view('dashboard.pages.history.stok', compact('histories', 'kategori', 'jenis'));
    }

    public function history()
    {
        $histories = HistoryManagementProduk::orderByDesc('tanggal')->get();
        $kategori = 2;

        return view('dashboard.pages.history.data', compact('histories', 'kategori'));
    }
}
