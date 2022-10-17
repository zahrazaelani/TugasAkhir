<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kepanitiaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KepanitiaanController extends Controller
{
    public function index()
    {
        $kepanitiaans = Kepanitiaan::where('users_id', Auth::user()->id)->get();
        return view('pages.portofolio.kepanitiaan',[
            'kepanitiaans' => $kepanitiaans
        ]);
    }

    public function create(){
        return view('pages.portofolio.kepanitiaan-create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'penyelenggara' => 'string|max:255',
            'nama_acara' => 'string|max:255',
            'nama_jabatan' => 'string|max:255',
            'divisi' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'lokasi' => 'string|max:255',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $kepanitiaan = Kepanitiaan::create($request->toArray());
        return redirect()->route('portofolio-kepanitiaan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kepanitiaan::findOrFail($id);
        $users = User::all();
        return view('pages.portofolio.kepanitiaan-edit',[
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
            'penyelenggara' => 'string|max:255',
            'nama_acara' => 'string|max:255',
            'nama_jabatan' => 'string|max:255',
            'divisi' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'lokasi' => 'string|max:255',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $kepanitiaan = Kepanitiaan::where('id', $request->id)->first();

        $kepanitiaan['penyelenggara'] = $request['penyelenggara'];
        $kepanitiaan['nama_acara'] = $request['nama_acara'];
        $kepanitiaan['nama_jabatan'] = $request['nama_jabatan'];
        $kepanitiaan['divisi'] = $request['divisi'];
        $kepanitiaan['waktu_mulai'] = $request['waktu_mulai'];
        $kepanitiaan['waktu_selesai'] = $request['waktu_selesai'];
        $kepanitiaan['lokasi'] = $request['lokasi'];
        $kepanitiaan['deskripsi'] = $request['deskripsi'];
        $kepanitiaan['updated_at'] = Carbon::now();

        $kepanitiaan->save();

        return redirect()->route('portofolio-kepanitiaan');
    }
    public function destroy($id)
    {
        $item = Kepanitiaan::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-kepanitiaan');
    }
}
