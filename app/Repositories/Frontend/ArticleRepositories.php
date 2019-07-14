<?php


namespace App\Repositories\Frontend;

use DB;
use App\Models\Article;

class ArticleRepositories
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle()
    {
        $category = DB::table('articles')->select('*')->get();
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

    public function getArticleByCategory($category_id)
    {
        $article = $this->article->category();
        dd($article);
        return $article;
    }

}
