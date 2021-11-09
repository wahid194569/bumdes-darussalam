<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function dashform()
    {
        $tipe_produk = DB::table('tipe_produk')->get();
        return view('dashform', ['tipe_produk' => $tipe_produk]);
    }

    public function inputform(Request $request)
    {
        $validatedData = $request->validate([
            'tipe_produk' => 'required',
            'nama_produk' => 'required|max:50',
            'detail_komposisi' => 'nullable|max:150',
            'harga_produk' => 'required|numeric|max:999999',
            'ukuran_kemasan' => 'required|max:6',
            'foto_produk' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_produk')) {
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('fotoProduk');
        }

        DB::table('barang')->insert($validatedData);
        
        return redirect('/dashboard')->with('upSuccess', 'Penambahan Produk Berhasil!');
    }

    public function delete($id)
    {

        // $pilih = DB::table('barang')->where('id', $id)->get();

        $pilih2 = DB::table('barang')
            ->where('id', $id)
            ->value('foto_produk');

        Storage::disk('public')->delete($pilih2);
        
        unset($pilih2);

        $del = DB::table('barang')
            ->where('id', $id)
            ->delete();

        return back()->with('delSuccess', 'Produk berhasil dihapus!');
    }

    public function dedit($id)
    {

        // $pilih2 = DB::table('barang')
        //     ->where('id', $id)
        //     ->value('foto_produk');
        
        // unset($pilih2);

        $dedit = DB::table('barang')
            ->where('id', $id)
            ->get();

        return view('dashedit', ['dedit' => $dedit]);
    }
}
