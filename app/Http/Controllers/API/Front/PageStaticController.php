<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiBaseResponse;
use App\Mappers\PageStaticMapper;
use App\Repositories\Frontend\PageStaticRepositories;
use Exception;
use Illuminate\Http\Response;
use Thomzee\Laramap\Facades\Laramap;

class PageStaticController extends Controller
{
    protected $pageStaticRepositories;
    protected $apiBaseResponse;

    public function __construct(PageStaticRepositories $pageStaticRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->pageStaticRepositories = $pageStaticRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getAllPageStatic()
    {
        try {
            $data = $this->pageStaticRepositories->getAllPageStatic();
            return Laramap::paged(PageStaticMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPageStaticById($id)
    {
        try {
            $data = $this->pageStaticRepositories->getPageStaticById($id);
            if (!empty($data)) {
                return Laramap::single(PageStaticMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPageStaticByName($name)
    {
        try {
            $data = $this->pageStaticRepositories->getPageStaticByName($name);
            if (!empty($data)) {
                return Laramap::single(PageStaticMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
