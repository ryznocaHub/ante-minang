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

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanbakus = BahanBaku::all();
        return view('dashboard.pages.manajemen.bahanbaku', compact('bahanbakus'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'      => ['required']
            ]
        );

        if ($request['satuantambah'] == 'select') {
            $satuan = $request->get('satuanSelect');
        } else if ($request['satuantambah'] == 'text') {
            $satuan = $request->get('satuanText');
        }

        $totalBahanBaku = BahanBaku::count();

        $bahanBaku = BahanBaku::create(
            [
                'kode'      => 'BB' . ($totalBahanBaku + 1),
                'nama'      => $request->get('nama'),
                'jumlah'    => 0,
                'satuan'    => $satuan
            ]
        );

        HistoryManagementBahanBaku::create(
            [
                'bahan_baku_id' => $bahanBaku->id,
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
                            'bahan_baku_id' => $bahanBaku->id,
                            'user_id'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
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
                            'bahan_baku_id' => $bahanBaku->id,
                            'user_id'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
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
        $request->validate(
            [
                'nama'  => ['required'],
            ]
        );

        if ($request['ubah'] == 'select') {
            $satuan = $request->get('satuanSelect');
        } else if ($request['ubah'] == 'text') {
            $satuan = $request->get('satuanText');
        }

        BahanBaku::where('id', $request->get('id'))
            ->update(
                [
                    'nama'      => $request->get('nama'),
                    'satuan'    => $satuan
                ]
            );

        HistoryManagementBahanBaku::create(
            [
                'bahan_baku_id' => $request->get('id'),
                'user_id'       => auth()->user()->id,
                'aksi'          => 'Ubah'
            ]
        );

        return redirect()->route('bahanbaku.index')->with('status', 'Sukses merubah bahan baku');
    }

    public function destroy(Request $request)
    {
        BahanBaku::where('id', $request->get('id'))->delete();

        return redirect()->route('bahanbaku.index')->with('status', 'Sukses menghapus bahan baku');
    }

    public function masuk()
    {
        $histories = HistoryBahanBaku::with('bahanbaku', 'user')
            ->where('kategori', 'Masuk')
            ->orderByDesc('tanggal')->get();
        $kategori = 1;

        return view('dashboard.pages.history', compact('histories', 'kategori'));
    }

    public function keluar()
    {
        $histories = HistoryBahanBaku::with('bahanbaku', 'user')
            ->where('kategori', 'Keluar')
            ->orderByDesc('tanggal')->get();
        $kategori = 2;

        return view('dashboard.pages.history', compact('histories', 'kategori'));
    }

    public function history()
    {
        $histories = HistoryManagementBahanBaku::orderBy('tanggal')->get();

        return view('dashboard.pages./');
    }
}
