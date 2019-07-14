<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Services\Frontend\InstagramService;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Instagram;

class FrontendController extends Controller
{
    protected $instagramService;
    protected $articleCategory;
    protected $articleCategoriesRepositories;

    public function __construct(InstagramService $instagramService,
                                ArticleCategoriesRepositories $articleCategoriesRepositories)
    {
        $this->instagramService = $instagramService;
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
    }

    public function index()
    {
        $instagrams = $this->instagramService->getRecentPostTalamedia();

        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        return view('frontend.index', compact('categoryName', 'instagrams'));
    }

    public function findBySlug($slug)
    {
        $pageCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug);

        /**
         * get Category Navbar Name
         */
        $categoryName = $this->articleCategoriesRepositories->getArticleCategory();

        /**
         * get Instagram Post
         */
        if (empty($pageCategory->instagram_access_token_1)) {

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName'));

        }elseif (empty($pageCategory->instagram_access_token_2)) {

            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $imageInstagramFirst = $contentInstagramFirst->media();

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst'));

        } else {

            //Get AccessToken For 2 AccesToken
            $contentInstagramFirst = new Instagram($pageCategory->instagram_access_token_1);
            $contentInstagramSecond = new Instagram($pageCategory->instagram_access_token_2);

            //for recent media  upload by user
            $imageInstagramFirst = $contentInstagramFirst->media();
            $imageInstagramSecond = $contentInstagramSecond->media();

            return view('frontend.pages.index',
                compact('pageCategory', 'categoryName', 'imageInstagramFirst', 'imageInstagramSecond'));

        }

    }

}
