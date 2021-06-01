<?php

namespace App\Http\Controllers;
use App\Models\HistoryProduk;
use App\Models\Produk;
use Carbon\Carbon;
use App\Models\BahanBaku;
use App\Models\HistoryBahanBaku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::where('nama', ' Keripik Sanjai')->first();
        $month = Carbon::now()->addMonth(1)->format('m');
        $year = Carbon::now()->format('Y');
        if($produk){
            $terjual = HistoryProduk::where('nama','Keripik Sanjai')
            ->where('tanggal','like', $year.' - '.$month.'%')
            ->where('keterangan', 'Terjual')
            ->sum('jumlah');
        }else{
            $produk = HistoryProduk::where('keterangan', 'Terjual')
            ->inRandomOrder()
            ->first();
            $terjual = HistoryProduk::where('nama',$produk->nama)
            ->where('tanggal','like', $year.' - '.$month.'%')
            ->where('keterangan', 'Terjual')
            ->sum('jumlah');
        }
        $produk1 = Produk::where('nama', 'Keripik Sanjai')->first();
        if(!$produk1){
            $produk1 = Produk::orderBy('jumlah','desc')
            ->first();
        }
        $bahan1 = BahanBaku::where('nama', 'singkong')->first();
        if(!$bahan1){
            $bahan1 = BahanBaku::orderBy('jumlah','desc')
            ->first();
        }
        $bahan2 = BahanBaku::where('nama', 'Biji Plastik')->first();
        if(!$bahan2){
            $bahan2 = BahanBaku::orderBy('jumlah','asc')
            ->first();
        }


        return view('dashboard/pages/index', compact('produk','terjual','produk1','bahan1', 'bahan2'));
    }
}
