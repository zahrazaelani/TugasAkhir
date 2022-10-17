<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DaftarProdukController extends Controller
{
     public function index(Request $request)
    {
        $products = Product::with(['galleries'])
        ->when($request->has('search'), function ($query) use ($request) { //bakal dijalanin klo yang kondisi parameter yang pertama itu terpenuhi 
            // di link ?search=a query parameter(search valuenya a). paramater function buat query berdasarkan requestnya(search kaya misal sear kandang )
            //$request itu dari luar kurung kurawa kalo mau dimasukin harus diuse dlu
                $query->where('name', 'LIKE', '%' . $request->search . '%'); //intinya buat nampilin ini dijalanin kalo ada request search maka ini dijalanin, fungsi search berdasarkan nama 
            })->inRandomOrder()->paginate(25);      //mengambil data product dengan relasi gelleries untuk mengambil gambar productnya

        return view('pages.daftarproduct',[
            'products' => $products,
        ]);
    }
}
