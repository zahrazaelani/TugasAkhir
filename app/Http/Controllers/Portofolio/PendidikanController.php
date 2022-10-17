<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendidikan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikans = Pendidikan::where('users_id', Auth::user()->id)->get();
        return view('pages.portofolio.pendidikan', [
            'pendidikans' => $pendidikans
        ]);
    }

    public function create(){ //fungsi menambahkan riwayat pendidikan
        return view ('pages.portofolio.pendidikan-create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jenjang' => 'string|max:255',
            'nama' => 'string|max:255',
            'jurusan' => 'nullable',
            'masuk' => 'integer',
            'keluar' => 'integer',
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $pendidikan = Pendidikan::create($request->toArray());

        return redirect()->route('portofolio-pendidikan');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item =Pendidikan::findOrFail($id);
        $users = User::all();
        return view('pages.portofolio.pendidikan-edit',[
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
            'jenjang' => 'string|max:255',
            'nama' => 'string|max:255',
            'jurusan' => 'nullable',
            'masuk' => 'integer',
            'keluar' => 'integer',
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $pendidikan = Pendidikan::where('id', $request->id)->first();

        $pendidikan['jenjang'] = $request['jenjang'];
        $pendidikan['nama'] = $request['nama'];
        $pendidikan['jurusan'] = $request['jurusan'];
        $pendidikan['masuk'] = $request['masuk'];
        $pendidikan['keluar'] = $request['keluar'];
        $pendidikan['updated_at'] = Carbon::now();

        $pendidikan->save();

        return redirect()->route('portofolio-pendidikan');
    }
    public function destroy($id)
    {
        $item = Pendidikan::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-pendidikan');
    }
}
