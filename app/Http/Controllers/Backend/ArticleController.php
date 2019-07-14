<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    /** get data table to show on method @index
     * @return mixed
     */
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
        $this->user = new User();
    }

    public function dataTables()
    {
        $data = numrows(Article::all());
        $user = User::all();
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
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        $tags = ArticleTag::all();
        return view('admin.backend.articles.create', compact('categories','tags'));
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
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'article_category_id' => 'required',
            'article_tag_id' => 'required',
        ]);


        $data = $this->model;
        $data->name = $request->get('name');
        $data->publish_datetime = Carbon::now();
        $data->featured_image = $request->get('featured_image');
        $data->content = $request->get('content');
        $data->meta_title = $request->get('meta_title');
        $data->slug = $request->get('slug');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keywords = $request->get('meta_keywords');
        $data->status = $request->get('status');
        $data->article_category_id = $request->get('article_category_id');
        $data->article_tag_id = $request->get('article_tag_id');
        $data->created_by= Auth::id();

        $data->save();

        return redirect()->route('article.index')
            ->with('article created successfully.');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = new Article();
        $data = $article->findOrFail($id);
        return view('admin.backend.articles.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = ArticleCategory::all();
        $tags = ArticleTag::all();
//        $article = new Article();
        $data = Article::findOrFail($id);
//        dd($data);
        return view('admin.backend.articles.edit',compact('data','tags','categories'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

//        dd($data);

        $request->validate([
            'name' => 'required',
            'featured_image' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'article_category_id' => 'required',
            'article_tag_id' => 'required',
        ]);
        $data->update([
            'name' => $request->name,
            'featured_image' => $request->featured_image,
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'content' => $request->get('content'),
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'article_category_id' => $request->article_category_id,
            'article_tag_id' => $request->article_tag_id,
        ]);

        return redirect('/article')->with('Article has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Article::find($id);
        $data->delete();

        return redirect()->route('article.index')
            ->with('article deleted successfully');
    }
}