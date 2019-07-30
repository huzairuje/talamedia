<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Repositories\Frontend\ArticleRepositories;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $articleRepositories;
    protected $articleCategoriesRepositories;

    public function __construct(ArticleRepositories $articleRepositories,
                                ArticleCategoriesRepositories $articleCategoriesRepositories)
    {
        $this->articleRepositories = $articleRepositories;
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
    }

    public function findArticleById($id)
    {
        $article = $this->articleRepositories->getArticleById($id);
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        return view('frontend.articles.index', compact('article', 'categoryName'));
    }

    public function findArticleBySlug($slug)
    {
        $article = $this->articleRepositories->getArticleBySlug($slug);
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory()->get();

        return view('frontend.articles.index', compact('article', 'categoryName'));
    }
}
