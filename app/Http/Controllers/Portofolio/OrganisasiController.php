<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasis = Organisasi::where('users_id', Auth::user()->id)->get();
        return view('pages.portofolio.organisasi',[
            'organisasis' => $organisasis
        ]);
    }

    public function create(){
        return view('pages.portofolio.organisasi-create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'string|max:255',
            'jabatan' => 'string|max:255',
            'divisi' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $organisasi = Organisasi::create($request->toArray());
        return redirect()->route('portofolio-organisasi');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Organisasi::findOrFail($id);
        $users = User::all();
        return view('pages.portofolio.organisasi-edit',[
            'item' => $item,
            'users' => $users
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'string|max:255',
            'jabatan' => 'string|max:255',
            'divisi' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $organisasi = Organisasi::where('id', $request->id)->first();

        $organisasi['nama'] = $request['nama'];
        $organisasi['jabatan'] = $request['jabatan'];
        $organisasi['divisi'] = $request['divisi'];
        $organisasi['waktu_mulai'] = $request['waktu_mulai'];
        $organisasi['waktu_selesai'] = $request['waktu_selesai'];
        $organisasi['deskripsi'] = $request['deskripsi'];
        $organisasi['updated_at'] = Carbon::now();

        $organisasi->save();

        return redirect()->route('portofolio-organisasi');
    }
    public function destroy($id)
    {
        $item = Organisasi::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-organisasi');
    }
}
