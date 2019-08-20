<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ArticleCategoryController extends Controller
{
    protected $model;

    public function __construct(ArticleCategory $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(ArticleCategory::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('articlecategory.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('articlecategory.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('articlecategory.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
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
        return view('admin.backend.articlecategorys.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('admin.backend.articlecategorys.create');
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
            'featured_image' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->get('name');
        if ($request->hasFile('featured_image')) {
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->status = $request->get('status');
        $data->instagram_access_token_1 = $request->get('instagram_access_token_1');
        $data->instagram_access_token_2 = $request->get('instagram_access_token_2');
        $data->instagram_access_token_3 = $request->get('instagram_access_token_3');
        $data->created_by= Auth::id();

        $data->save();

        return redirect()->route('articlecategory.index')
            ->with('Category created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $articlecategory = new ArticleCategory();
        $data = $articlecategory->findOrFail($id);
        return view('admin.backend.articlecategorys.show',compact('data'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $articlecategory = new ArticleCategory();
        $data = $articlecategory->findOrFail($id);
        return view('admin.backend.articlecategorys.edit',compact('data'));
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
            'status' => 'required',
        ]);

        $data->name = $request->get('name');
        $data->status = $request->get('status');
        if ($request->hasFile('featured_image')) {
            File::delete('public/images/'.$data->featured_image);
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->instagram_access_token_1 = $request->get('instagram_access_token_1');
        $data->instagram_access_token_2 = $request->get('instagram_access_token_2');

        $data->update();

        return redirect()->route('articlecategory.index')->with( 'Category has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = ArticleCategory::find($id);
        $data->delete();

        return redirect()->route('articlecategory.index')
            ->with('Category deleted successfully');
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
