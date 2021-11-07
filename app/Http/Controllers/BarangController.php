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
        return view('menu', ['barang1' => $barang1,'barang2' => $barang2])->with('menu', '');
    }

    public function chat(Request $request)
    {
        $pesanan = $request->all();
        unset($pesanan["_token"]);
        unset($pesanan["submit"]);
        $formatChat = "Hai%2C%20saya%20ingin%20membeli%20produk%3A%20%0A";

        foreach ($pesanan as $pesan) {
            $formatChat .= "-%20" . ucwords($pesan) . "%2C%20Sebanyak%3A%20%0A";
        }

        unset($pesanan);
        $formatChat .= "%0AApakah%20tersedia%3F";

        $formatChat = str_replace(" ","%20", $formatChat);
        return redirect("https://wa.me/6283832581088?text=$formatChat");
        
    }

    public function dashboard()
    {
        $barang = DB::table('barang')
            ->join('tipe_produk', 'barang.tipe_produk', '=', 'tipe_produk.id_tipe')
            ->select('barang.*', 'barang.tipe_produk', 'tipe_produk.nama_tipe')
            ->get();

        return view('dashboard', ['barang' => $barang]);
    }
}
