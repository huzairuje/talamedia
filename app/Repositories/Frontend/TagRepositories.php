<?php


namespace App\Repositories\Frontend;

use App\Models\ArticleTag;

class TagRepositories
{
    protected $articleTag;

    public function __construct(ArticleTag $articleTag)
    {
        $this->articleTag = $articleTag;
    }

    public function getAllArticleTag()
    {
        $articleTag = ArticleTag::orderBy('created_at', 'desc')->get();
        return $articleTag;
    }

}
