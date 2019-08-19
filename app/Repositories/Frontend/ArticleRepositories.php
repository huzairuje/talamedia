<?php


namespace App\Repositories\Frontend;

use App\Http\Library\ApiBaseResponse;
use App\Models\Article;

class ArticleRepositories
{
    protected $article;
    protected $responseLib;

    public function __construct(Article $article, ApiBaseResponse $responseLib)
    {
        $this->article = $article;
        $this->responseLib = $responseLib;
    }

    public function getArticle()
    {
        $category = Article::orderBy('created_at', 'desc');
        return $category;
    }

    public function getArticleBySlug($slug)
    {
        $article = Article::where('name', 'like', '%' . $slug . '%')->first();
        return $article;
    }

    public function getArticleById($id)
    {
        $articlePageId = Article::find($id);
        return $articlePageId;
    }

    public function getArticleFeatured()
    {
        $article = $this->article->where('is_featured_article', '=', 1)->orderBy('created_at', 'desc');
        return $article;
    }

}
