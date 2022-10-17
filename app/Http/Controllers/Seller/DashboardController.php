<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::With(['product'])
        ->where('users_id', auth()->user()->id)
        ->sum('transactions.total_price')
        ;


        $newrevenue = Transaction::With(['product'])
        ->where('transaction_status', 'PENDING')
        ->where('users_id', auth()->user()->id)
        ->count();

        $transaction = Transaction::count();

        $pending = Transaction::With(['product'])
        ->where('transaction_status', 'PENDING')
        ->where('users_id', auth()->user()->id)->count();

        $success = Transaction::With(['product'])
        ->where('transaction_status', 'SUCCESS')
        ->where('users_id', auth()->user()->id)->count();

        $canceled = Transaction::With(['product'])
        ->where('transaction_status', 'CANCELLED')
        ->where('users_id', auth()->user()->id)->count();

        $done = Transaction::With(['product'])
        ->where('transaction_status', 'DONE')
        ->where('users_id', auth()->user()->id)->count();

        $recentlytransaction=Transaction::orderBy('transactions.updated_at', 'desc')
        ->join('users','users.id','transactions.users_id')
        ->join('transaction_details','transactions.id','transaction_details.products_id')
        ->join('products','products.id','transaction_details.products_id')
        ->where('products.users_id',auth()->user()->id)
        ->limit(3)
        ->get();

        $bestselling = DB::select('SELECT *,products.name as nama_produk, categories.name as nama_kategori, (select count(*) from transaction_details where products.id = transaction_details.products_id) AS count FROM products JOIN categories ON products.categories_id = categories.id
        WHERE products.users_id=? ORDER BY count DESC;', [auth()->user()->id]);


        return view('pages.seller.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'pending' => $pending,
            'success' => $success,
            'canceled' => $canceled,
            'recentlytransaction'=>$recentlytransaction,
            'bestselling'=>$bestselling,
            'done'=>$done,
            'newrevenue'=>$newrevenue,

        ]);
    }
}
