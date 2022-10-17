<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ExperiencesController extends Controller
{
    public function index()
    {
        $experiences = Experience::where('users_id', Auth::user()->id)->get();
        $jabatans = Jabatan::all();
        return view('pages.portofolio.experiences', [
            'experiences' => $experiences,
            'jabatans' => $jabatans
        ]);
    }

    public function create(){
        $user = Auth::user();
        $jabatans = Jabatan::all();
        return view('pages.portofolio.experiences-create', [
            'user' => $user,
            'jabatans'=>$jabatans
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jabatan' => 'string|max:255',
            'jabatans_id' => 'integer',
            'perusahaan' => 'string|max:255',
            'lokasi_perusahaan' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'bidang' => 'string|max:255',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $experiences = Experience::create($request->toArray());

        return redirect()->route('portofolio-experiences');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Experience::findOrFail($id);
        $users = User::all();
        $jabatans = Jabatan::all();
        return view('pages.portofolio.experiences-edit',[
            'item' => $item,
            'users' => $users,
            'jabatans' => $jabatans,
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
            'jabatan' => 'string|max:255',
            'jabatans_id' => 'integer',
            'perusahaan' => 'string|max:255',
            'lokasi_perusahaan' => 'string|max:255',
            'waktu_mulai' => 'date',
            'waktu_selesai' => 'date',
            'bidang' => 'string|max:255',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $experience = Experience::where('id', $request->id)->first();

        $experience['jabatan'] = $request['jabatan'];
        $experience['jabatans_id'] = $request['jabatans_id'];
        $experience['perusahaan'] = $request['perusahaan'];
        $experience['lokasi_perusahaan'] = $request['lokasi_perusahaan'];
        $experience['waktu_mulai'] = $request['waktu_mulai'];
        $experience['waktu_selesai'] = $request['waktu_selesaijabatan'];
        $experience['bidang'] = $request['bidang'];
        $experience['deskripsi'] = $request['deskripsi'];
        $experience['updated_at'] = Carbon::now();

        $experience->save();

        return redirect()->route('portofolio-experiences');
    }
    public function destroy($id)
    {
        $item = Experience::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-experiences');
    }

}
