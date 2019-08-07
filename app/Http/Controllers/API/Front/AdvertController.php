<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\AdvertFrontMapper;
use App\Repositories\Frontend\AdvertCategoriesRepositories;
use App\Repositories\Frontend\AdvertRepositories;
use App\Http\Controllers\Controller;
use Thomzee\Laramap\Facades\Laramap;
use Exception;

class AdvertController extends Controller
{
    protected $advertCategoriesRepositories;
    protected $advertRepositories;
    protected $apiBaseResponse;

    public function __construct(AdvertRepositories $advertRepositories,
                                AdvertCategoriesRepositories $advertCategoriesRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->advertCategoriesRepositories = $advertCategoriesRepositories;
        $this->advertRepositories = $advertRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getAdvertFeatured()
    {
        try {
            $data = $this->advertRepositories->getAdvertFeatured()->paginate(6);
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertOnArticlePage()
    {
        try {
            $data = $this->advertRepositories->getAdvertOnArticlePage()->paginate(5);
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertOnCategory()
    {
        try {
            $data = $this->advertRepositories->getAdvertOnCategoryPage()->paginate(4);
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertSingle($slug)
    {
        try {
            $data = $this->advertRepositories->getAdvertBySlug($slug);
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

}
