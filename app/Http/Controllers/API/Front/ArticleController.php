<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\ArticleCategoryMapper;
use App\Mappers\ArticleDetailMapper;
use App\Mappers\ArticleMapper;
use App\Repositories\Frontend\ArticleCategoriesRepositories;
use App\Repositories\Frontend\ArticleRepositories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Exception;
use Thomzee\Laramap\Facades\Laramap;

class ArticleController extends Controller
{
    protected $articleCategoriesRepositories;
    protected $articleRepositories;
    protected $apiBaseResponse;

    public function __construct(ArticleRepositories $articleRepositories,
                                ArticleCategoriesRepositories $articleCategoriesRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->articleCategoriesRepositories = $articleCategoriesRepositories;
        $this->articleRepositories = $articleRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getArticleBySlug($slug)
    {
        try {
            $data = $this->articleRepositories->getArticleBySlug($slug);
            return Laramap::single(ArticleDetailMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleByCategory($slug)
    {
        try {
            $articleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)
                ->articles()->orderBy('created_at', 'desc')->paginate(10);
            return Laramap::paged(ArticleMapper::class, $articleByCategory);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleFeatured()
    {
        try {
            $featuredArticle = $this->articleRepositories->getArticleFeatured()->paginate(4);
            return Laramap::paged(ArticleMapper::class, $featuredArticle);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleCategory()
    {
        try {
            $articleCategory = $this->articleCategoriesRepositories->getArticleCategory()->paginate(10);
            return Laramap::paged(ArticleCategoryMapper::class, $articleCategory);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getAllArticle()
    {
        try {
            $articles = $this->articleRepositories->getArticle()->paginate(10);
            return Laramap::paged(ArticleMapper::class, $articles);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}