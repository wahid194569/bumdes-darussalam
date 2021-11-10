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

    public function dedit(Request $request)
    {
        $dedit = DB::table('barang')
            ->where('id', $request->id)
            ->first();

        $selectors = DB::table('tipe_produk')
            ->get();

        return view('dashedit', ['dedit' => $dedit, 'selectors' => $selectors ])->with('asli', '');
    }

    public function ledit(Request $request)
    {

        if ($request->file('foto_produk')) {
            $validatedData = $request->validate([
                'id' => 'required',
                'tipe_produk' => 'required',
                'nama_produk' => 'required|max:50',
                'detail_komposisi' => 'nullable|max:150',
                'harga_produk' => 'required|numeric|max:999999',
                'ukuran_kemasan' => 'required|max:6',
                'foto_produk' => 'image|file|max:1024',
            ]);

            $pilihf = DB::table('barang')
                ->where('id', $validatedData['id'])
                ->value('foto_produk');

            Storage::disk('public')->delete($pilihf);
            
            unset($pilihf);

            if ($request->file('foto_produk')) {
                $validatedData['foto_produk'] = $request->file('foto_produk')->store('fotoProduk');
            }

            $insert = DB::table('barang')
                ->where('id', $validatedData['id'])
                ->update([
                    'tipe_produk' => $validatedData['tipe_produk'],
                    'nama_produk' => $validatedData['nama_produk'],
                    'detail_komposisi' => $validatedData['detail_komposisi'],
                    'harga_produk' => $validatedData['harga_produk'],
                    'ukuran_kemasan' => $validatedData['ukuran_kemasan'],
                    'foto_produk' => $validatedData['foto_produk'],
                ]);

        }else{
            $validatedData = $request->validate([
                'id' => 'required',
                'tipe_produk' => 'required',
                'nama_produk' => 'required|max:50',
                'detail_komposisi' => 'nullable|max:150',
                'harga_produk' => 'required|numeric|max:999999',
                'ukuran_kemasan' => 'required|max:6'
            ]);

            $insert = DB::table('barang')
                ->where('id', $validatedData['id'])
                ->update([
                    'tipe_produk' => $validatedData['tipe_produk'],
                    'nama_produk' => $validatedData['nama_produk'],
                    'detail_komposisi' => $validatedData['detail_komposisi'],
                    'harga_produk' => $validatedData['harga_produk'],
                    'ukuran_kemasan' => $validatedData['ukuran_kemasan'],
            ]);
        }


        return $this->dashboard();
    }
}
