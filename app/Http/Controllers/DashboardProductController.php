<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProductRequest;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries','category','transactiondetail', 'tags'])
                    ->where('users_id', Auth::user()->id)
                    ->get();

        return view('pages.dashboard-products',[
            'products' => $products,
        ]);
    }
    
    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();
        $tags = Tags::all();

        return view('pages.dashboard-products-details',[
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }
    
    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tags::all();

        return view('pages.dashboard-products-create',[
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['tags'] = json_encode($request->tags);

        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-product');
    }
    public function delete($id)
    {
        $item = Product::findOrFail($id);
        $productGalleries = ProductGallery::where('products_id', $id)->get();

        foreach ($productGalleries as $productGallery) {
            if (File::delete(public_path('storage/'.$productGallery->photos))) {
                $productGallery->delete();
            }
        }
        $item->delete();

        return redirect()->route('dashboard-product');
    }
}
