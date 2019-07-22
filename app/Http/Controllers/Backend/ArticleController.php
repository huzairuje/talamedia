<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleArticletag;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{


    protected $model;
    protected $articletag;


    public function __construct(Article $model)
    {
        $this->model = $model;
        $this->articletag = new ArticleArticletag;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(Article::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('article.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('article.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('article.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('created_by', function ($data){
                return $data->user->name;
            })
            ->editColumn('is_featured_article', function ($data){
                return $data->is_featured_article == 1 ? 'Yes' : 'No';
            })
            ->make(true);
    }

    /** show datatable
     * @return View
     */
    public function index()
    {
        return view('admin.backend.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        $tags = ArticleTag::all();
        return view('admin.backend.articles.create', compact('categories','tags'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'featured_image' => 'required|max:2048',
            'is_featured_article' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'article_category_id' => 'required',
        ]);

        DB::beginTransaction();
        $data = $this->model;
        $data->name = $request->get('name');
        $data->publish_datetime = Carbon::now();
        if ($request->hasFile('featured_image')) {
            $data->featured_image = $this->uploadFeaturedImage($request);
        }
        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->is_featured_article = $request->get('is_featured_article');
        $data->article_category_id = $request->get('article_category_id');
        $data->created_by= Auth::id();
        $data->save();
        DB::commit();

        $articletags = $this->articletag;
        foreach ($articletags as $articletag){
            $articletags = $request['article_tag_id'];
            $article = ArticleTag::findOrFail($articletags);
            $count = count($article);
            if ($count == 0){
                return redirect()->route('article.index')->with(['error' => 'Pesan Error']);
            }
        }
        $data->articleTags()->attach($articletags);
        return redirect()->route('article.index')
            ->with('article created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $article = new Article();
        $data = $article->findOrFail($id);
        $tags = ArticleTag::all();
        return view('admin.backend.articles.show',compact('data','tags'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $categories = ArticleCategory::all();
        $tags = ArticleTag::all();
        $data = Article::findOrFail($id);
        return view('admin.backend.articles.edit',compact('data','tags','categories'));
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
            'meta_title' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'article_category_id' => 'required',
            'article_tag_id' => 'required',
        ]);

        $data->name = $request->get('name');
        $data->publish_datetime = Carbon::now();

        if ($request->hasFile('featured_image')) {
            File::delete('public/images/'.$data->featured_image);
            $data->featured_image = $this->uploadFeaturedImage($request);
        }

        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->is_featured_article = $request->get('is_featured_article');
        $data->article_category_id = $request->get('article_category_id');
        $data->created_by= Auth::id();
        $data->update();
        $articletags = $this->articletag;
        foreach ($articletags as $articletag){
            $articletags = $request['article_tag_id'];
            $article = ArticleTag::findOrFail($articletags);
        }
        return redirect()->route('article.index')->with('Article has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = Article::find($id);
        $data->delete();

        return redirect()->route('article.index')
            ->with('article deleted successfully');
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
