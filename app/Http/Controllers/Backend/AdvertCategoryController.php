<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvertCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
class AdvertCategoryController extends Controller
{
    protected $model;

    public function __construct(AdvertCategory $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @throws
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
     * @return View
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->get('name');
        $data->status = $request->get('status');
        $data->created_by= Auth::id();

        $data->save();

        return redirect()->route('advertcategory.index')
            ->with('Category created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $advertcategory = new AdvertCategory();
        $data = $advertcategory->findOrFail($id);
        return view('admin.backend.advertcategorys.show',compact('data'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $advertcategory = new AdvertCategory();
        $data = $advertcategory->findOrFail($id);
        return view('admin.backend.advertcategorys.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
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
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = AdvertCategory::find($id);
        $data->delete();

        return redirect()->route('advertcategory.index')
            ->with('Advert deleted successfully');
    }
}
