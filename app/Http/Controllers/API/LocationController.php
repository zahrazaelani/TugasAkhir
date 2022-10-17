<?php

namespace App\Http\Controllers\API;

use App\Models\Regency;
use App\Models\Province;
use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function provinces(Request $request) //langsung nampilin semua provinsi
    {
        return Province::all();
    }

    public function regencies(Request $request, $provinces_id) //ditampilin klo udh milih provinsi
    {
        return Regency::where('province_id', $provinces_id)->get();
    }
     public function couriers(Request $request) //langsung nampilin semua provinsi
    {
        return Courier::all();
    }
}
