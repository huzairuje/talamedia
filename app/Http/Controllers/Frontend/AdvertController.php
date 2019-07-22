<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Frontend\AdvertCategoriesRepositories;
use App\Repositories\Frontend\AdvertRepositories;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{

    protected $advertRepositories;
    protected $advertCategoriesRepositories;

    public function __construct(AdvertRepositories $advertRepositories,
                                AdvertCategoriesRepositories $advertCategoriesRepositories)
    {
        $this->advertRepositories = $advertRepositories;
        $this->advertCategoriesRepositories = $advertCategoriesRepositories;
    }

    public function findAdvertById($id)
    {
        $advert = $this->advertRepositories->getAdvertById($id);
//        $categoryName = $this->advertCategoriesRepositories->getAdvertCategory();

        return view('frontend.advert.index', compact('advert', 'categoryName'));
    }

    public function findAdvertBySlug($slug)
    {
        $advert = $this->advertRepositories->getAdvertBySlug($slug);
//        $categoryName = $this->advertCategoriesRepositories->getAdvertCategory();

        return view('frontend.advert.index', compact('advert', 'categoryName'));
    }
}
