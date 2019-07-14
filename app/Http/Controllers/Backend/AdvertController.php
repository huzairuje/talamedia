<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;


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
        $data = numrows(Advert::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('advert.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('advert.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('advert.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdvertCategory::all();
        return view('admin.backend.adverts.create', compact('categories'));
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'featured_image' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'cannonical_link' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'advert_category_id' => 'required',
        ]);


        $data = $this->model;
        $data->name = $request->get('name');
        $data->publish_datetime = Carbon::now();
        $data->featured_image = $request->get('featured_image');
        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->cannonical_link = $request->get('cannonical_link');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->advert_category_id = $request->get('advert_category_id');
        $data->created_by= Auth::id();


        $data->save();

        return redirect()->route('advert.index')
            ->with('advert created successfully.');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $advert = new Advert();
        $data = $advert->findOrFail($id);
        return view('admin.backend.adverts.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'featured_image' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'cannonical_link' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'advert_category_id' => 'required',
        ]);
        $data->update([
            'name' => $request->name,
            'featured_image' => $request->featured_image,
            'content' => $request->get('content'),
            'meta_title' => $request->meta_title,
            'cannonical_link' => $request->cannonical_link,
            'slug' => $request->slug,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
            'advert_category_id' => $request->advert_category_id,
        ]);        return redirect('/article')->with( 'Advert has been updated');
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
}