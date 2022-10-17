<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\TagsRequest;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Tags::query();

            return DataTablesDataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                            <div>
                                <a href="' . route('tags.edit', $item->id) . '" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                            <div style="margin-left: 10px;">
                                <form action="'.route('tags.destroy', $item->id) .'" method="POST">
                                    '. method_field('delete').  csrf_field() .'
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->tags); //manggil data foto proses upload disini.request file dari field yg bernama photo kemudian disimpen di folder 'assets/category' dan dibuat public jd bisa dibuka dari mana saja. jangan lupa 'php artisan storage:link' buat koneksiin gambarnya biar muncul

        Tags::create($data);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tags::findOrFail($id);

        return view('pages.admin.tags.edit',[
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
    public function update(TagsRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->tags);

        $item = Tags::findOrFail($id);

        $item->update($data);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tags::findOrFail($id);
        $item->delete();

        return redirect()->route('tags.index');
    }
}
