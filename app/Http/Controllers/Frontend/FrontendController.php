<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Repositories\Frontend\AdvertRepositories;
use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Repositories\Frontend\ArticleRepositories;
use App\Repositories\Frontend\TagRepositories;
use App\Services\Frontend\InstagramService;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Instagram;

class FrontendController extends Controller
{
    protected $instagramService;
    protected $articleCategory;
    protected $articleCategoriesRepositories;
    protected $article;
    protected $articleRepositories;
    protected $advertRepositories;
    protected $tagRepositories;

    public function __construct(InstagramService $instagramService,
                                Article $article,
                                ArticleRepositories $articleRepositories,
                                TagRepositories $tagRepositories,
                                AdvertRepositories $advertRepositories,
                                ArticleCategoriesRepositories $articleCategoriesRepositories)
    {
        $this->instagramService = $instagramService;
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
        $this->articleRepositories = $articleRepositories;
        $this->advertRepositories = $advertRepositories;
        $this->article = $article;
        $this->tagRepositories = $tagRepositories;
    }

    public function index()
    {
        $instagrams = $this->instagramService->getRecentPostTalamedia();

        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        $featuredArticle = $this->articleRepositories->getArticleFeatured();

        $getAllArticle = $this->articleRepositories->getArticle();

        $getAllTags = $this->tagRepositories->getAllArticleTag();

        return view('frontend.index', compact('categoryName', 'instagrams', 'featuredArticle',
            'getAllArticle', 'getAllTags'));
    }

    public function findCategoryBySlug($slug)
    {
        $pageCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug);

        $articleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)
            ->articles()->orderBy('created_at', 'desc')->get();

        $getAllTags = $this->tagRepositories->getAllArticleTag();

        /**
         * get Category Navbar Name
         */
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        /**
         * get Instagram Post
         */
        if (empty($pageCategory->instagram_access_token_1)) {

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName' , 'articleByCategory', 'getAllTags'));

        }elseif (empty($pageCategory->instagram_access_token_2)) {

            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $imageInstagramFirst = $contentInstagramFirst->media(['count' => 12]);

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst' , 'articleByCategory', 'getAllTags'));

        } else {

            //Get AccessToken For 2 AccesToken
            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $contentInstagramSecond = new Instagram($pageCategory->instagram_access_token_2);

            //for recent media  upload by user
            $imageInstagramFirst = $contentInstagramFirst->media(['count' => 6]);
            $imageInstagramSecond = $contentInstagramSecond->media(['count' => 6]);

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst', 'imageInstagramSecond',
                    'articleByCategory', 'getAllTags'));

        }

    }

}
