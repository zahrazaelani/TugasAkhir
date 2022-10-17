<?php

namespace App\Http\Controllers\portofolio;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.portofolio.portofolio-setting', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isPublic' => 'required|boolean'
        ]); //dari pilihan publik/tdk 

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::where('id', $request->id)->first();

        $user['isPublic'] = $request['isPublic'];

        $user->save();

        return view('pages.portofolio.portofolio-setting', [
            'user' => $user
        ]);
    }
}
