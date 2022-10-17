<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Whoops\Run;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::where('users_id', Auth::user()->id)->get();

        return view('pages.portofolio.projects', [
            'projects' => $projects
        ]);
    }

    public function create(){
        return view ('pages.portofolio.project-create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul' => 'string|max:255',
            'status' => 'string|max:255',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $project = Project::create($request->toArray());
        return redirect()->route('portofolio-projects');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Project::findOrFail($id);
        $users = User::all();
        return view('pages.portofolio.project-edit',[
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
            'judul' => 'string|max:255',
            'status' => 'string|max:255',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'deskripsi' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $project = Project::where('id', $request->id)->first();

        $project['judul'] = $request['judul'];
        $project['status'] = $request['status'];
        $project['tanggal_mulai'] = $request['tanggal_mulai'];
        $project['tanggal_selesai'] = $request['tanggal_selesai'];
        $project['deskripsi'] = $request['deskripsi'];
        $project['updated_at'] = Carbon::now();

        $project->save();

        return redirect()->route('portofolio-projects');
    }
    public function destroy($id)
    {
        $item = Project::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-projects');
    }
}
