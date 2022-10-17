<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailProdukController extends Controller
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

        return view('pages.detail1', [
            'ratingCount' => $ratingCount,
            'rating' => $rating,
            'product' => $product,
            'comment'=> $comment,
        ]);
    }
}
