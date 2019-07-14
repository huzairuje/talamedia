<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ArticleTagController extends Controller
{
    protected $model;

    public function __construct(ArticleTag $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(ArticleTag::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('articletag.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('articletag.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('articletag.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('status', function ($data){
                return $data->status == 1 ? 'Active' : 'InActive';
            })
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.articletags.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.articletags.create');
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->get('name');
        $data->status = $request->get('status');
        $data->created_by= Auth::id();
        $data->save();

        return redirect()->route('articletag.index')
            ->with('Tag created successfully.');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $articletag = new ArticleTag();
        $data = $articletag->findOrFail($id);
        return view('admin.backend.articletags.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $articletag = new ArticleTag();
        $data = $articletag->findOrFail($id);
        return view('admin.backend.articletags.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
        $data->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect('/articletag')->with( 'Tag has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $articletag = new ArticleTag();
        $data = $articletag->findOrFail($id);

        $data->delete($id);
        return redirect()->route('articletag.index')
            ->with('Tag deleted successfully');
    }
}
