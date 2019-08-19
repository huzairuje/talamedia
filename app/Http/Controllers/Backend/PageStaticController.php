<?php

namespace App\Http\Controllers\Backend;

use App\Models\PageStatic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PageStaticController extends Controller
{
    protected $model;

    public function __construct(PageStatic $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(PageStatic::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('pagestatic.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                     <a href="'.route('pagestatic.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                     <a href="'.route('pagestatic.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('created_by', function ($data){
                return $data->user->name;
            })
            ->make(true);
    }

    /** show datatable
     * @return View
     */
    public function index()
    {
        return view('admin.backend.pagestatic.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('admin.backend.pagestatic.create');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'featured_image' => 'required|max:2048',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        $data = $this->model;
        $data->name = $request->get('name');
        if ($request->hasFile('featured_image')) {
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->content = $request->get('content');
        $data->seo_title = $request->get('seo_title');
        $data->seo_keyword = $request->get('seo_keyword');
        $data->seo_description = $request->get('seo_description');
        $data->status = $request->get('status');
        $data->created_by= Auth::id();
        $data->save();
        DB::commit();

        return redirect()->route('pagestatic.index')
            ->with('page created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.pagestatic.show',compact('data'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.pagestatic.edit',compact('data'));
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
            'name' => 'required',
            'content' => 'required',
            'featured_image' => 'required|max:2048',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
            'status' => 'required',
        ]);

        $data->name = $request->get('name');
        if ($request->hasFile('featured_image')) {
            File::delete('public/images/'.$data->featured_image);
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->content = $request->get('content');
        $data->seo_title = $request->get('seo_title');
        $data->seo_keyword = $request->get('seo_keyword');
        $data->seo_description = $request->get('seo_description');
        $data->status = $request->get('status');
        $data->updated_by= Auth::id();
        $data->update();

        return redirect()->route('pagestatic.index')->with('Page has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect()->route('pagestatic.index')
            ->with('Page deleted successfully');
    }

    /**
     * Upload Image Method, store and update using this method
     * @param Request $request
     * @return string
     */
    public function uploadFeaturedImage(Request $request)
    {
        $featuredImage = $request->file('featured_image');
        $initialImageName = $featuredImage->getClientOriginalName();
        $getDate = Carbon::now();
        $imageName = $getDate.$initialImageName;
        $request->file('featured_image')->storeAs('public/images/', $imageName);
        return $imageName;
    }


}
