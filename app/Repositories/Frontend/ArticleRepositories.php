<?php


namespace App\Repositories\Frontend;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleRepositories
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

//    public function getArticle()
//    {
//        $category = DB::table('articles')->select('*')->get();
//        return $category;
//    }
    public function getArticle()
    {
        $category = Article::all();
        return $category;
    }

    public function getArticleBySlug($slug)
    {
        $articlePage = Article::where('name', '=', $slug)->firstOrFail();
        return $articlePage;
    }

    public function getArticleById($id)
    {
        $articlePageId = Article::findOrFail($id);
        return $articlePageId;
    }

    public function getArticleFeatured()
    {
        $article = Article::where('is_featured_article', '=', 1)->get();
        return $article;
    }

}
