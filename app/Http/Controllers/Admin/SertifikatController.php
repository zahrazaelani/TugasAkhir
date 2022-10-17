<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) { //manggil data di dalam tabel
            $query = Skill::with(['user']); //untuk nampilin model skill yang berelasi dg user


            return DataTablesDataTables::of($query)
                ->addColumn('photo', function ($skill) {
                    return '
                    <div>
                    <img src="' .url('storage/assets/skill/'.$skill->path_url_photo )  . '" border="0" width="100" class="img img-fluid img-rounded" align="center" />
                    </div>
                ';
                })
                ->addColumn('action', function ($item) { //untuk buat button edit mengarah ke edit sertifikat
                    return '
                        <div>
                                    <a href="' . route('sertifikat.edit', $item->id) . '" class="btn btn-info">
                                        Edit
                                    </a>
                        </div>
                    ';
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }

        $data_sertifikat = [
            'total' => Skill::count(),
            'approved' => Skill::where('status', 'verified')->count(),
            'rejected' => Skill::where('status', 'rejected')->count(),
            'pending' => Skill::where('status', 'pending')->count(),
        ];

        return view('pages.admin.sertifikat.index', compact('data_sertifikat'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Skill::findOrFail($id);

        return view('pages.admin.sertifikat.edit', [
            'item' => $item,
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
        $validator = Validator::make($request->all(), [
            'status' => 'string|max:255',
            'alasan' => 'required_if:status,rejected'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $skill = Skill::where('id', $id)->first();

        $skill['status'] = $request['status'];
        $skill['alasan'] = $request['alasan'];
        $skill['updated_at'] = Carbon::now();

        $skill->save();

        return redirect()->route('sertifikat.index');
    }
}
