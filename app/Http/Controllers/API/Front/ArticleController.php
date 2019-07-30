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

class ArticleController extends Controller
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
                                Article $article,
                                ArticleRepositories $articleRepositories,
                                TagRepositories $tagRepositories,
                                AdvertRepositories $advertRepositories,
                                ArticleCategoriesRepositories $articleCategoriesRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->instagramService = $instagramService;
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
        $this->articleRepositories = $articleRepositories;
        $this->advertRepositories = $advertRepositories;
        $this->article = $article;
        $this->tagRepositories = $tagRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getArticleBySlug($slug)
    {
        try {
            $data = $this->articleRepositories->getArticleBySlug($slug);
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleByCategory($slug)
    {
        try {
            $articleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)
                ->articles()->orderBy('created_at', 'desc');
            $response = $this->apiBaseResponse->listPaginate($articleByCategory, 10);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleFeatured()
    {
        try {
            $featuredArticle = $this->articleRepositories->getArticleFeatured();
            $response = $this->apiBaseResponse->listPaginate($featuredArticle, 10);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleCategory()
    {
        try {
            $articleCategory = $this->articleCategoriesRepositories->getArticleCategory();
            $response = $this->apiBaseResponse->listPaginate($articleCategory, 10);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getAllArticle()
    {
        try {
            $articles = $this->articleRepositories->getArticle();
            $response = $this->apiBaseResponse->listPaginate($articles, 10);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
