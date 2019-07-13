<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvertCategory;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use DataTables;
use Auth;
class AdvertCategoryController extends Controller
{
    protected $model;

    public function __construct(AdvertCategory $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(AdvertCategory::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('advertcategory.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('advertcategory.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('advertcategory.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
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
        return view('admin.backend.advertcategorys.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.advertcategorys.create');
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd(Auth::id());
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->get('name');
        $data->status = $request->get('status');
        $data->created_by= Auth::id();
//        $data->status = $request->get('status');
//        $data = new ArticleCategory([
//            'name' => $request->get('name'),
//            'status' => $request->get('status'),
//        ]);

        $data->save();

        return redirect()->route('advertcategory.index')
            ->with('Category created successfully.');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $advertcategory = new AdvertCategory();
        $data = $advertcategory->findOrFail($id);
        return view('admin.backend.advertcategorys.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $advertcategory = new AdvertCategory();
        $data = $advertcategory->findOrFail($id);
        return view('admin.backend.advertcategorys.edit',compact('data'));
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
        return redirect('/advertcategory')->with( 'Category has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = AdvertCategory::find($id);
        $data->delete();

        return redirect()->route('advertcategory.index')
            ->with('Advert deleted successfully');
    }
}
