<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementBarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('dashboard.pages.manajemen', compact('barangs'));
    }

    public function masuk()
    {
        $histories = History::with('barang', 'user')->where('kategori', 'Masuk')->orderByDesc('tanggal')->get();
        $kategori = '1';
        return view('dashboard.pages.history', compact('histories', 'kategori'));
    }

    public function keluar()
    {
        $histories = History::with('barang', 'user')->where('kategori', 'Keluar')->orderByDesc('tanggal')->get();
        $kategori = '2';
        return view('dashboard.pages.history', compact('histories', 'kategori'));
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah'        => ['numeric', 'min:0']
        ]);

        if ($request['customRadio'] == 'select') {
            $keterangan = $request->get('keteranganSelect');
        } else if ($request['customRadio'] == 'text') {
            $keterangan = $request->get('keteranganText');
        }

        switch ($request->input('action')) {
            case 'tambah':
                DB::transaction(function () use ($request, $keterangan) {
                    $barang = Barang::where('id', $request->input('id'))->first();
                    $kode = History::where('id_barang', $barang->id)->count();
                    History::create(
                        [
                            'id_barang'     => $request->input('id'),
                            'id_user'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
                            'keterangan'    => $keterangan,
                            'kategori'      => 'Masuk',
                            'kode'          => $barang->kode_barang . ($kode + 1)
                        ]
                    );

                    Barang::where('id', $barang->id)->update([
                        'jumlah'    => $barang->jumlah + $request->get('jumlah')
                    ]);
                }, 5);
                break;
            case 'kurang':
                DB::transaction(function () use ($request, $keterangan) {
                    $barang = Barang::where('id', $request->input('id'))->first();
                    $kode = History::where('id_barang', $barang->id)->count();
                    History::create(
                        [
                            'id_barang'     => $request->input('id'),
                            'id_user'       => auth()->user()->id,
                            'jumlah'        => $request->get('jumlah'),
                            'keterangan'    => $keterangan,
                            'kategori'      => 'Keluar',
                            'kode'          => $barang->kode_barang . ($kode + 1)
                        ]
                    );

                    Barang::where('id', $barang->id)->update([
                        'jumlah'    => $barang->jumlah - $request->get('jumlah')
                    ]);
                }, 5);
            case 'update':
        }
        return redirect()->back();
    }
}
