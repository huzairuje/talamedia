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

    public function getArticle()
    {
        $category = Article::orderBy('created_at', 'desc');
        return $category;
    }

    public function getArticleBySlug($slug)
    {
        $articlePage = Article::where('slug', '=', $slug)->firstOrFail();
        return $articlePage;
    }

    public function getArticleById($id)
    {
        $articlePageId = Article::findOrFail($id);
        return $articlePageId;
    }

    public function getArticleFeatured()
    {
        $article = $this->article->where('is_featured_article', '=', 1)->orderBy('created_at', 'desc');
        return $article;
    }

}
