<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $articleModel;

    public function __construct(Article $articleModel)
    {
        $this->articleModel = $articleModel;
    }

    public function searchAllArticle(Request $request)
    {
        $data = $this->articleModel;
        if(request()->get('title')) {
            $categoryId = $data->where('content_title', 'ilike', '%'.request()->get('title').'%')->value('id');
            $data = $this->articleModel->where('category_id', $categoryId);

            return view('frontend.search.index', compact('data'));
        }
    }
}
