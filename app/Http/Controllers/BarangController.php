<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function tampilkan(){
        $barang1 = DB::table('barang')->where('tipe_produk', '1')->get();
        $barang2 = DB::table('barang')->where('tipe_produk', '2')->get();
        return view('menu', ['barang1' => $barang1,'barang2' => $barang2]);
    }
}
