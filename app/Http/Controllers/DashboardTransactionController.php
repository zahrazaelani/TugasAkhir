<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        //Variable untuk memanggil data transaksi barang yang berhasil dijual
        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries']) //memanggil data DB dan relasi di model
                            ->whereHas('product', function($product){ //mencari produk yang berhasil terjual
                                $product->where('users_id', Auth::user()->id); //mencari transaksi pada user yang sedang login
                            })->get();

        //viriable untuk memanggil data transaksi barang yang user Beli
 
        $buyTransactionCart = Transaction::where('users_id', Auth::user()->id)
                                ->get();

        return view('pages.dashboard-transactions',[
            'sellTransactions' => $sellTransactions, //viriable yang akan dipakai di view
            'buyTransactionCart' => $buyTransactionCart, //viriable yang akan dipakai di view
        ]);
    }


    public function transactionCartDetail($id)
    {
        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('transaction', function($transaction){ // mencari transaksi yang berhasil terbuat
                                $transaction->where('users_id', Auth::user()->id);       //mencari transaksi pada user yang sedang login
                            })->where('transactions_id', $id)->get();

        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries']) //memanggil data DB dan relasi di model
                            ->whereHas('product', function($product){ //mencari produk yang berhasil terjual
                                $product->where('users_id', Auth::user()->id); //mencari transaksi pada user yang sedang login
                            })->where('transactions_id', $id)->get();

        $transaction = Transaction::where('id', $id)
                            ->get();

        return view('pages.dashboard-transactions-cart-detail',[
            'cartBuyTransactions' => $buyTransactions,
            'cartSellTransactions' => $sellTransactions,
            'transaction' => $transaction
        ]);
    }

    public function details(Request $request, $id)
    {
        //variable untuk memanggil detail transaksi
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->findOrFail($id); //mencari deetail transaksi langsung dari ID transaksinya

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all(); //digunakan untuk mengambil semua data request 

        $item = TransactionDetail::findOrFail($id);

        $item->update($data); //update item dari pencarin ID diatas dengan data yang sudah di request

        return redirect()->route('dashboard-transaction-details', $id); //redirect ke dalam route transaksi detail 
    }

    public function review(){
        return view('pages.dashboard-review');
    }
}
