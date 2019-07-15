<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Repositories\Frontend\AdvertRepositories;
use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Repositories\Frontend\ArticleRepositories;
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

    public function __construct(InstagramService $instagramService,
                                Article $article,
                                ArticleRepositories $articleRepositories,
                                AdvertRepositories $advertRepositories,
                                ArticleCategoriesRepositories $articleCategoriesRepositories)
    {
        $this->instagramService = $instagramService;
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
        $this->articleRepositories = $articleRepositories;
        $this->advertRepositories = $advertRepositories;
        $this->article = $article;
    }

    public function index()
    {
        $instagrams = $this->instagramService->getRecentPostTalamedia();

        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        $featuredArticle = $this->articleRepositories->getArticleFeatured();

        $getAllArticle = $this->articleRepositories->getArticle();


        return view('frontend.index', compact('categoryName', 'instagrams', 'featuredArticle', 'getAllArticle'));
    }

    public function findCategoryBySlug($slug)
    {
        $pageCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug);

        $articleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)->articles()->isfeaturedarticle()->get();

        /**
         * get Category Navbar Name
         */
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        /**
         * get Instagram Post
         */
        if (empty($pageCategory->instagram_access_token_1)) {

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName' , 'articleByCategory'));

        }elseif (empty($pageCategory->instagram_access_token_2)) {

            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $imageInstagramFirst = $contentInstagramFirst->media(['count' => 14]);

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst' , 'articleByCategory'));

        } else {

            //Get AccessToken For 2 AccesToken
            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $contentInstagramSecond = new Instagram($pageCategory->instagram_access_token_2);

            //for recent media  upload by user
            $imageInstagramFirst = $contentInstagramFirst->media(['count' => 14]);
            $imageInstagramSecond = $contentInstagramSecond->media(['count' => 14]);

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst', 'imageInstagramSecond', 'articleByCategory'));

        }

    }

    public function findArticle($id)
    {
        $article = $this->articleRepositories->getArticleById($id);
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        return view('frontend.articles.index', compact('article', 'categoryName'));
    }

    public function findAdvert($id)
    {
        $advert = $this->advertRepositories->getAdvertById($id);
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        return view('frontend.adverts.index', compact('advert', 'categoryName'));
    }

}
