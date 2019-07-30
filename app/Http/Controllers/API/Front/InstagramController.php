<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Models\Article;
use App\Repositories\Frontend\AdvertRepositories;
use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Repositories\Frontend\ArticleRepositories;
use App\Repositories\Frontend\TagRepositories;
use App\Services\Frontend\InstagramService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Exception;

class InstagramController extends Controller
{
    protected $instagramService;
    protected $articleCategory;
    protected $articleCategoriesRepositories;
    protected $article;
    protected $articleRepositories;
    protected $advertRepositories;
    protected $tagRepositories;
    protected $apiBaseResponse;

    public function __construct(InstagramService $instagramService,
                                ApiBaseResponse $apiBaseResponse,
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
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getInstagramTalamedia()
    {
        try {
            $data = $this->instagramService->getRecentPostTalamedia();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramInfoUnpad()
    {
        try {
            $data = $this->instagramService->getRecentPostInfoUnpad();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramInfoItb()
    {
        try {
            $data = $this->instagramService->getRecentPostInfoItb();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramBdgNet()
    {
        try {
            $data = $this->instagramService->getRecentPostBdgNet();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramNangorInfo()
    {
        try {
            $data = $this->instagramService->getRecentPostNangorInfo();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramTrifantasia()
    {
        try {
            $data = $this->instagramService->getRecentPostTrifantasia();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
