<?php

namespace App\Http\Controllers\BahanBaku;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\History;
use App\Models\HistoryBahanBaku;
use App\Models\HistoryManagementBahanBaku;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanbakus = BahanBaku::all();
        $reseps = Resep::with('produk')->get();

        return view('dashboard.pages.manajemen.bahanbaku', compact('bahanbakus', 'reseps'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'      => ['required', Rule::unique('bahan_bakus', 'nama')]
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

        $bahanBaku = BahanBaku::create(
            [
                'nama'      => $request->get('nama'),
                'jumlah'    => 0,
                'satuan'    => $satuan
            ]
        );

        BahanBaku::where('id', $bahanBaku->id)->update(
            [
                'kode'      => 'BB' . ($bahanBaku->id)
            ]
        );

        $bahanBaku = BahanBaku::orderByDesc('id')->first();

        HistoryManagementBahanBaku::create(
            [
                'kode'          => $bahanBaku->kode,
                'nama'          => $bahanBaku->nama,
                'user_id'       => auth()->user()->id,
                'aksi'          => 'Tambah'
            ]
        );

        return redirect()->route('bahanbaku.index')->with('status', 'Sukses menambah bahan baku');
    }

    public function update(Request $request, $id)
    {

        if ($request['radioKeterangan'] == 'select') {
            $keterangan = $request->get('keteranganSelect');
        } else if ($request['radioKeterangan'] == 'text') {
            $request->validate(
                [
                    'keteranganText'    => ['required']
                ]
            );
            $keterangan = $request->get('keteranganText');
        }

        switch ($request->input('update')) {
            case 'tambah':
                $request->validate(
                    [
                        'jumlah' => ['numeric', 'min:1', 'required']
                    ]
                );

                DB::transaction(function () use ($request, $keterangan, $id) {
                    $bahanBaku = BahanBaku::where('id', $id)->first();

                    HistoryBahanBaku::create(
                        [
                            'kode'          => $bahanBaku->kode,
                            'nama'          => $bahanBaku->nama,
                            'user_id'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
                            'satuan'        => $request->get('satuan'),
                            'keterangan'    => $keterangan,
                            'kategori'      => 'Masuk'
                        ]
                    );

                    BahanBaku::where('id', $id)->update(
                        [
                            'jumlah'    => $bahanBaku->jumlah + $request->get('jumlah')
                        ]
                    );
                });
                break;
            case 'kurang':
                $request->validate(
                    [
                        'jumlah' => ['numeric', 'min:1', 'required']
                    ]
                );

                DB::transaction(function () use ($request, $keterangan, $id) {
                    $bahanBaku = BahanBaku::where('id', $id)->first();

                    HistoryBahanBaku::create(
                        [
                            'kode'          => $bahanBaku->kode,
                            'nama'          => $bahanBaku->nama,
                            'user_id'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
                            'satuan'        => $request->get('satuan'),
                            'keterangan'    => $keterangan,
                            'kategori'      => 'Keluar'
                        ]
                    );

                    BahanBaku::where('id', $id)->update(
                        [
                            'jumlah'    => $bahanBaku->jumlah - $request->get('jumlah')
                        ]
                    );
                });
                break;
        }
        return redirect()->route('bahanbaku.index')->with('status', 'Sukses merubah data');
    }

    public function updateBahanBaku(Request $request)
    {
        if ($request['ubah'] == 'select') {
            $satuan = $request->get('satuanSelect');
        } else if ($request['ubah'] == 'text') {
            $request->validate(
                [
                    'satuanText'    => ['required']
                ]
            );
            $satuan = $request->get('satuanText');
        }

        $bahanBaku = BahanBaku::where('id', $request->get('id'))->first();
        $nama = $request->get('nama');

        if ($nama == null) {
            $nama = $bahanBaku->nama;
        } else {
            $request->validate(
                [
                    'nama' => [Rule::unique('bahan_bakus', 'nama')]
                ]
            );
        }

        $cekUpdate = BahanBaku::where('id', $request->get('id'))
            ->where('nama', $nama)
            ->where('satuan', $satuan)
            ->first();

        if ($cekUpdate) {
            return redirect()->route('bahanbaku.index');
        }

        DB::transaction(function () use ($request, $satuan, $nama, $bahanBaku) {

            BahanBaku::where('id', $request->get('id'))
                ->update(
                    [
                        'nama'      => $nama,
                        'satuan'    => $satuan
                    ]
                );

            HistoryManagementBahanBaku::create(
                [
                    'kode'          => $bahanBaku->kode,
                    'nama'          => $bahanBaku->nama,
                    'user_id'       => auth()->user()->id,
                    'aksi'          => 'Ubah'
                ]
            );
        });

        return redirect()->route('bahanbaku.index')->with('status', 'Sukses merubah bahan baku');
    }

    public function destroy(Request $request)
    {
        $bahanBaku = BahanBaku::where('id', $request->get('id'))->first();

        HistoryManagementBahanBaku::create(
            [
                'kode'          => $bahanBaku->kode,
                'nama'          => $bahanBaku->nama,
                'user_id'       => auth()->user()->id,
                'aksi'          => 'Hapus'
            ]
        );

        BahanBaku::where('id', $request->get('id'))->delete();

        return redirect()->route('bahanbaku.index')->with('status', 'Sukses menghapus bahan baku');
    }

    public function masuk()
    {
        $histories = HistoryBahanBaku::with('user')
            ->where('kategori', 'Masuk')
            ->orderByDesc('tanggal')->get();
        $kategori = 1;
        $jenis = 1;

        return view('dashboard.pages.history.stok', compact('histories', 'kategori', 'jenis'));
    }

    public function keluar()
    {
        $histories = HistoryBahanBaku::with('user')
            ->where('kategori', 'Keluar')
            ->orderByDesc('tanggal')->get();
        $kategori = 2;
        $jenis = 1;

        return view('dashboard.pages.history.stok', compact('histories', 'kategori', 'jenis'));
    }

    public function history()
    {
        $histories = HistoryManagementBahanBaku::orderByDesc('tanggal')->get();
        $kategori = 1;

        return view('dashboard.pages.history.data', compact('histories', 'kategori'));
    }
}
