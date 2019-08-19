<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\AdvertFrontMapper;
use App\Repositories\Frontend\AdvertCategoriesRepositories;
use App\Repositories\Frontend\AdvertRepositories;
use App\Http\Controllers\Controller;
use Thomzee\Laramap\Facades\Laramap;
use Exception;
use Illuminate\Http\Response;

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

    public function getAllAdvert()
    {
        try {
            $data = $this->advertRepositories->getAdvert();
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertFeatured()
    {
        try {
            $data = $this->advertRepositories->getAdvertFeatured();
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertOnArticlePage()
    {
        try {
            $data = $this->advertRepositories->getAdvertOnArticlePage();
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertOnCategory()
    {
        try {
            $data = $this->advertRepositories->getAdvertOnCategoryPage();
            return Laramap::paged(AdvertFrontMapper::class, $data);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertSingle($slug)
    {
        try {
            $data = $this->advertRepositories->getAdvertBySlug($slug);
            if (!empty($data)) {
                return Laramap::single(AdvertFrontMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

    public function getAdvertById($id)
    {
        try {
            $data = $this->advertRepositories->getAdvertById($id);
            if (!empty($data)) {
                return Laramap::single(AdvertFrontMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return Laramap::error($e);
        }
    }

}
