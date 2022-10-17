<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tags;

class ListProductController extends Controller
{
     public function index(Request $request)
    {
        $products = Product::with(['galleries'])
        ->when($request->has('search'), function ($query) use ($request) { //bakal dijalanin klo yang kondisi parameter yang pertama itu terpenuhi 
            // di link ?search=a query parameter(search valuenya a). paramater function buat query berdasarkan requestnya(search kaya misal sear kandang )
            //$request itu dari luar kurung kurawa kalo mau dimasukin harus diuse dlu
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tags', 'LIKE', '%'. $request->search  .'%'); //intinya buat nampilin ini dijalanin kalo ada request search maka ini dijalanin, fungsi search berdasarkan nama 
            })->inRandomOrder()->paginate(9);      //mengambil data product dengan relasi gelleries untuk mengambil gambar productnya

            $categories = Category::all();
            $tags = Tags::take(8)->get();
        
        return view('pages.listproduct',[
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();      //mengambil kategori berdasrkan nama slugnya untuk dipanggil 
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(8); //mengambil data product bersama relasi gallery untuk dipangil berdasrakan category yang diingikan
        $tags = Tags::take(8)->get();

        return view('pages.listproduct',[
            'categories' => $categories,
            'products' => $products,
            'tags' => $tags,
        ]);
    }

    public function detailTag(Request $request, $slug)
    {
        $categories = Category::all();
        $tags = Tags::all();
        $tag = Tags::where('slug', $slug)->firstOrFail();      //mengambil kategori berdasrkan nama slugnya untuk dipanggil 
        $products = Product::with(['galleries'])->where('tags', 'LIKE', '%' .$tag->tags. '%')->paginate(8); //mengambil data product bersama relasi gallery untuk dipangil berdasrakan category yang diingikan
        $tags = Tags::take(8)->get();

        return view('pages.listproduct',[
            'categories' => $categories,
            'products' => $products,
            'tags' => $tags,
        ]);
    }
}
