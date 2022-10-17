<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();


        return view('pages.dashboard-settings',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $data['image'] = $request->file('image')->store('assets/users', 'public');

        $item->update($data);

        if($request->store_status == 0){
            $carts = Cart::whereHas('product', function ($query) {
                return $query->where('users_id', '=', auth()->user()->id);
            })->get();

            foreach($carts as $cart){
                $cart->delete();
            }
        }

        return redirect()->route($redirect);
    }
}
