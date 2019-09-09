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
            if (!empty($data)) {
                $articles = Laramap::single(ArticleDetailMapper::class, $data);
                $mapsArticles = $articles->original;

                /**
                 * related Articles
                 */
                $dataRelatedArticles = $this->articleRepositories->getArticle()->paginate();
                $relatedArticles = Laramap::paged(ArticleMapper::class, $dataRelatedArticles);
                $mapsRelatedArticles = $relatedArticles->original;

                return response([
                    'article' => $mapsArticles,
                    'related_articles' => $mapsRelatedArticles
                ]);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleById($id)
    {
        try {
            $data = $this->articleRepositories->getArticleById($id);
            if (!empty($data)) {
                return Laramap::single(ArticleDetailMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getArticleByCategory($slug)
    {
        try {
            /**
             * find Article Category
             */
            $articleCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug);
            if (!empty($articleCategory)){
                /**
                 * featured_article
                 */
                $featuredArticleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)
                    ->articles()
                    ->orderBy('created_at', 'desc')
                    ->where('is_featured_article', '=', '1')
                    ->first();
                /**
                 * list_article by category
                 */
                $articleByCategory = $this->articleCategoriesRepositories->getArticleCategoryBySlug($slug)
                    ->articles()
                    ->where('id', '!=', $featuredArticleByCategory->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate();

                /**
                 * add object to custom response to paginate data
                 */
                $dataArticleCategory = Laramap::single(ArticleCategoryMapper::class, $articleCategory);
                $mapsDataArticleCategory = $dataArticleCategory->original;

                $dataFeaturedArticleCategory = Laramap::single(ArticleMapper::class, $featuredArticleByCategory);
                $mapsFeaturedArticleCategory = $dataFeaturedArticleCategory->original;

                $dataArticleByCategory = Laramap::paged(ArticleMapper::class, $articleByCategory);
                $mapsDataArticleByCategory = $dataArticleByCategory->original;

                return response([
                    'category' => $mapsDataArticleCategory,
                    'featured_article'=> $mapsFeaturedArticleCategory,
                    'article_by_category' => $mapsDataArticleByCategory
                ]);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
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
            $articleCategory = $this->articleCategoriesRepositories->getArticleCategory()->paginate();
            return Laramap::paged(ArticleCategoryMapper::class, $articleCategory);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllArticle()
    {
        try {
            $articles = $this->articleRepositories->getArticle()->paginate();
            return Laramap::paged(ArticleMapper::class, $articles);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
