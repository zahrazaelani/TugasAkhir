<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id) //parameternya = id tp idnya bebentuk slug bukan int
    {
        $product = Product::with(['galleries', 'user','transactiondetail'])->where('slug', $id)->firstOrFail();
        
        $rating = TransactionDetail::where('products_id', $product->id)
                    ->whereNotNull('rating')
                    ->get();

        if( $rating->sum('rating') > 0 && $rating->count() > 0){
            $ratingCount = $rating->sum('rating') / $rating->count(); 
        } else {
            $ratingCount = 0;
        }
        

        $comment = TransactionDetail::where('products_id', $product->id)
                    ->whereNotNull('komentar')
                    ->with('transaction.user')
                    ->get();           

        return view('pages.detail', [
            'ratingCount' => $ratingCount,
            'rating' => $rating,
            'product' => $product,
            'comment'=> $comment,
        ]);
    }

    public function add(Request $request, Product $product)
    {
        // Mencari produk apakah sudah ada di cart
        $carts = Cart::where('users_id', Auth::id())->where('products_id', $product->id)->first();

        if (!$carts) {
            // Jika produk belum ada di cart, maka akan ditambahkan
            $cart = new Cart();
            $cart->users_id = Auth::id();
            $cart->products_id = $product->id;
            $cart->quantity = 1;
            $cart->save();
        } else {
            // Jika produk sudah ada di cart, maka akan ditambahkan quantity
            // Cek apakah jumlah produk kurang dari sama dengan stok produk
            if ($carts->quantity+1 <= $product->stock) {
                // Jika jumlah produk kurang dari sama dengan stok produk, maka akan ditambahkan quantity
                $carts->quantity += 1;
                $carts->save();
            } else {
                // Jika jumlah produk lebih dari stok produk, maka akan ditampilkan pesan error
                return redirect()->back()->with('error', 'Quantity produk pada cart melebihi stok');
            }
        }
        return redirect()->route('cart');
    }
}
