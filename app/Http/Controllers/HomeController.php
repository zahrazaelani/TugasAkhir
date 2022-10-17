<?php

namespace App\Http\Controllers;

use App\Models\Prodi;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() != null && Auth::user()->roles == "MAHASISWA") { 
            $users = Prodi::join('users', 'prodis.id', '=', 'users.prodis_id')->where('isPublic', 1)->get(); /*Jika login sbg mahasiswa, maka akan dicari dari tabel prodi yang akan dijoin dg users.prodis_id, yang isPublis=1 */
            $skills = null; /*dibuat null krn di pages portofolio dibutuhkan skills */
            return view('pages.portofolio', [
                'users' => $users,
                'skills' => $skills
            ]);
        }
        else {
            $categories = Category::take(6)->get();
            $products = Product::with(['galleries'])->latest()->take(8)->get();
            $sliders = Slider::take(3)->get();
            $productBest = Product::withSum('transactiondetail', 'quantity') // buat ngitung total jumlah produk dari tabel transaksi detail
            ->orderBy('transactiondetail_sum_quantity', 'DESC') // diurutin dari jumlah penjualan tergede. kalo mau diurutin dri penjualan paling kecil dignti ASC aja
            ->take(8)
            ->get();
    
            return view('pages.home',[
                'categories'=> $categories,
                'products' => $products,
                'productBests' => $productBest,
                'sliders' => $sliders,
            ]);
        }
    }
}
