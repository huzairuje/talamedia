<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\AdvertCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class AdvertController extends Controller
{

    /** get data table to show on method @index
     * @return mixed
     */
    protected $model;

    public function __construct(Advert $model)
    {
        $this->model = $model;
    }

    public function dataTables()
    {
        $userRole = Auth::user()->role()->get();
        foreach ($userRole as $role) {
            $nameRole = $role->name;
            if ($nameRole == 'super_admin') {
                $data = numrows(Advert::all());
            } else {
                $data = numrows(Advert::all()->where('created_by', Auth::id()));
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return
                        '<a href="' . route('advert.show', $data->id) . '" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="' . route('advert.edit', $data->id) . '" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="' . route('advert.delete', $data->id) . '" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
                })
                ->editColumn('created_by', function ($data) {
                    return $data->user->name;
                })
                ->editColumn('is_featured_advert', function ($data) {
                    return $data->is_featured_advert == 1 ? 'Yes' : 'No';
                })
                ->make(true);
        }
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.adverts.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $categories = AdvertCategory::all();
        return view('admin.backend.adverts.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'featured_image' => 'required|max:2048',
            'content' => 'required',
            'meta_title' => 'required',
            'cannonical_link' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'is_featured_advert' => 'required',
            'advert_category_id' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->get('name');
        $data->publish_datetime = Carbon::now();
        if ($request->hasFile('featured_image')) {
            $data->featured_image = $this->uploadFeaturedImage($request);
        }        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->cannonical_link = $request->get('cannonical_link');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->is_featured_advert = $request->get('is_featured_advert');
        $data->is_featured_advert = $request->get('is_on_category_page');
        $data->is_featured_advert = $request->get('is_on_article_page');
        $data->advert_category_id = $request->get('advert_category_id');
        $data->created_by= Auth::id();

        $data->save();

        return redirect()->route('advert.index')
            ->with('advert created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $advert = new Advert();
        $data = $advert->findOrFail($id);
        return view('admin.backend.adverts.show',compact('data'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {

        $categories = AdvertCategory::all();
        $advert = new Advert();
        $data = $advert->findOrFail($id);
        return view('admin.backend.adverts.edit',compact('data','categories'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return View
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $request->validate([
            'name' => 'required',
            'featured_image' => 'required|max:2048',
            'content' => 'required',
            'meta_title' => 'required',
            'cannonical_link' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'advert_category_id' => 'required',
        ]);
        $data->name = $request->get('name');
        if ($request->hasFile('featured_image')) {
            File::delete('public/images/'.$data->featured_image);
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->cannonical_link = $request->get('cannonical_link');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->advert_category_id = $request->get('advert_category_id');

        $data->update();

        return redirect()->route('advert.index')->with('Advert has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Advert::find($id);
        $data->delete();

        return redirect()->route('advert.index')
            ->with('advert deleted successfully');
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
