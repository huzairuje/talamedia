<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    protected $articleCategoriesRepositories;

    public function __construct(ArticleCategoriesRepositories $articleCategoriesRepositories)
    {
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
    }

    public function index()
    {
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();
        return view('frontend.privacypolicy.index', compact('categoryName'));

    }
}
