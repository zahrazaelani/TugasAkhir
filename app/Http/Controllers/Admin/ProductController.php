<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Tags;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ProductController extends Controller
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
            //query datatable
            $query = Product::with(['user','category', 'tags'])->withSum('transactiondetail','quantity'); //manggil sm relasinya

            return DataTablesDataTables::of($query) //bentuk json buat balikin data dataable
                ->addColumn('action', function($item){
                    return '

                    <div class="btn-group">
                        <div>
                            <a href="' . route('product.edit', $item->id) . '" class="btn btn-primary">
                                Edit
                            </a>
                        </div>
                        <div style="margin-left: 10px;">
                            <form action="'. route('product.destroy', $item->id) .'" method="POST">
                                '. method_field('delete').  csrf_field() .'
                                <button type="submit" class="btn btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select("*")
                        ->where("roles", "=", 'USER')
                        ->get();
            
        // $users = User::all();
        $categories = Category::all();
        $tags = Tags::all();
        
        return view('pages.admin.product.create', [
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all(); //variable data isinya semua data yang masuk

        $data['slug'] = Str::slug($request->name); //slug digunakan untuk menamai urlnya. menggunakan str slug. tulisan apa yang mau dibentuk slug kalo pada produk ini namanya 
        $data['tags'] = json_encode($request->tags);

        Product::create($data);

        return redirect()->route('product.index');
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
        $item = Product::findOrFail($id);
        $users = User::select("*")
                        ->where("roles", "=", 'USER')
                        ->get();
        $categories = Category::all();
        $tags = Tags::all();

        return view('pages.admin.product.edit',[
            'item' => $item,
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name); //biar wktu update nama, slugnya jg ke update
        $data['tags'] = json_encode($request->tags);

        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);

        $productGalleries = ProductGallery::where('products_id', $id)->get();

        foreach ($productGalleries as $productGallery) {
            if (File::delete(public_path('storage/'.$productGallery->photos))) {
                $productGallery->delete();
            }
        }

        $item->delete();

        return redirect()->route('product.index');
    }
}

