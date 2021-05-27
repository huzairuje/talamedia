<?php


namespace App\Repositories\Frontend;

use App\Models\ArticleCategory;

class ArticleCategoriesRepositories
{

    protected $articleCategory;

    public function __construct(ArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function getArticleCategoryName()
    {
        $categoryName = $this->articleCategory->all()->pluck('name');

        return $categoryName;
    }

    public function getArticleCategory()
    {
        $category = $this->articleCategory->orderBy('created_at', 'desc');
        return $category;
    }

    public function getArticleCategoryBySlug($slug)
    {
        $pageCategory = ArticleCategory::where('name', 'like', '%' . $slug . '%')->first();
        return $pageCategory;
    }

    public function getArticleCategoryById($id)
    {
        $articlePageId = ArticleCategory::findOrFail($id);
        return $articlePageId;
    }

}
