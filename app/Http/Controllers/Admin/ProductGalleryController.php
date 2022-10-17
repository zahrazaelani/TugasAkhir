<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\ProductGalleryRequest;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = ProductGallery::with(['product']);

            return DataTablesDataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <div>
                                    <form action="'. route('product-gallery.destroy', $item->id) .'" method="POST" class="btn btn-danger">
                                        '. method_field('delete').  csrf_field() .'
                                        <button type="submit" class="dropdown-item text-light">
                                            Hapus
                                        </button>
                                    </form>
                                
                        </div>
                    ';
                })
                ->editColumn('photos', function($item){ //nama fungsinya adalah editColum buatngedit kolom foto. yang udah ada yaitu photo(buat nampilin fotondari url img)
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 80px" />' : ''; //dikembalikan dalam bentuk url dibuat menggunakan ternary function
                //ngecek ada foto apa ga, kalo ada munculin gambar klo gada kosongan
                    //disimpan img src, memanggil url storage dari foto itu sndiri
                })
                ->rawColumns(['action','photos']) //buat enntuin column 2 diatas. kalo ga dikasi photos munculnya urlnya
                ->make();
        }

        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product ::all();
        
        return view('pages.admin.product-gallery.create', [
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all(); //variable data isinya semua data yang masuk

        $data['photos'] = $request->file('photos')->store('assets/product', 'public'); //manggil data foto buat proses upload disini.request file dari field yg bernama photo kemudian disimpen di folder 'assets/product' dan dibuat public jd bisa dibuka dari mana saja. jangan lupa 'php artisan storage:link' buat koneksiin gambarnya biar muncul

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-gallery.index');
    }
}

