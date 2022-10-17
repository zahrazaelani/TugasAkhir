<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Courier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CartController extends Controller
{
    public function index()                     //index untuk menampilkan di halaman utama cart
    {
        // varible untuk menampilkan data di cart
        $carts = Cart::with(['product.galleries', 'user']) //megambil data relasi di bagian cart untuk product beserta gallerynya & user
                ->where('users_id', Auth::user()->id) //melihat cart bedasarkan user yang sedang aktif
                ->get();
        $couriers = Courier::all();
        return view('pages.cart', [
            'carts' => $carts,
            'couriers'=>$couriers,
        ]);
    }

    public function delete(Request $request, $id)  //fungsi untuk mengahpus data cart
    {
        $cart = Cart::findOrFail($id);          //mencari data dari cart berdasarkan idnya

        $cart->delete();            //mengahpus data cart padda id yang dicari diatas
        return redirect()->route('cart');
    }

    public function success() {
        return view('pages.success');
    }


    public function updateQuantity(Request $request, Cart $cart) // fungsi untuk mengupdate jumlah produk pada cart
    {
        // Cek berapa stock produk
        $stok_produk = Product::find($cart->products_id)->stock;

        // Cek apa jumlah kurang dari sama dengan stok produk
        if ($request->quantity <= $stok_produk) {
            // Jika jumlah kurang dari sama dengan stok produk, maka update jumlah produk
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            // Jika jumlah lebih dari stok produk, maka tampilkan pesan error
            return redirect()->back()->with('error', 'Jumlah produk pada cart melebihi stok');
        }
    }

    public function cekOngkir(Request $request, $regencies_id) {
        // Menghitung berapa jumlah toko dalam cart
        $jumlah_toko = DB::table('carts')

            ->where('carts.users_id', Auth::user()->id)
            ->join('products', 'carts.products_id', '=', 'products.id') // buat join tabel produk sm carts fk di tabel carts pk di tabel produk
            ->selectRaw('count(products.users_id)') //hitung jumlah users produknya ada brp users
            ->groupBy('products.users_id') // fungsinya klo masukin produk yg sama dri toko yg sama digroup gt ga dipisah jadi cuma ditambah qty nya
            ->get()->count();  
        // Menghitung berat
        $weight = DB::table('carts')
            ->where('carts.users_id', Auth::user()->id)
            ->join('products', 'carts.products_id', '=', 'products.id')
            ->selectRaw('sum(products.weight * carts.quantity) as weight')->first()->weight;

        // Menghitung ongkos kirim dari pos
        $data_pos = RajaOngkir::ongkosKirim([
            'origin' => 445, // regency id kota surakarta
            'destination' => $regencies_id, // regency id kota pembeli
            'weight' => $weight, // berat dalam gram
            'courier' => 'pos' // kurir pengiriman
        ]);

        // Menghitung ongkos kirim dari jne
        $data_jne = RajaOngkir::ongkosKirim([
            'origin' => 445, // regency id kota surakarta
            'destination' => $regencies_id, // regency id kota pembeli
            'weight' => $weight, // berat dalam gram
            'courier' => 'jne' // kurir pengiriman
        ]);

        // Menghitung ongkos kirim dari tiki
        $data_tiki = RajaOngkir::ongkosKirim([
            'origin' => 445, // regency id kota surakarta
            'destination' => $regencies_id, // regency id kota pembeli
            'weight' => $weight, // berat dalam gram
            'courier' => 'tiki' // kurir pengiriman
        ]);

        foreach($data_jne->result[0]['costs'] as $value){
            $data_ongkir["JNE ".$value['description']] = $value['cost'][0]['value'] * $jumlah_toko;
        }

        foreach($data_pos->result[0]['costs'] as $value){
            $data_ongkir["POS ".$value['description']] = $value['cost'][0]['value'] * $jumlah_toko;
        }

        foreach($data_tiki->result[0]['costs'] as $value){
            $data_ongkir["TIKI ".$value['description']] = $value['cost'][0]['value'] * $jumlah_toko;
        }

        return $data_ongkir;
    }

}
