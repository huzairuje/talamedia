<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\InstagramMapper;
use App\Services\Frontend\InstagramService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Exception;
use Thomzee\Laramap\Facades\Laramap;

class InstagramController extends Controller
{
    protected $instagramService;
    protected $apiBaseResponse;

    public function __construct(InstagramService $instagramService,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->instagramService = $instagramService;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getInstagramTalamedia()
    {
        try {
            $data = $this->instagramService->getRecentPostTalamedia();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramInfoUnpad()
    {
        try {
            $data = $this->instagramService->getRecentPostInfoUnpad();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramInfoItb()
    {
        try {
            $data = $this->instagramService->getRecentPostInfoItb();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramBdgNet()
    {
        try {
            $data = $this->instagramService->getRecentPostBdgNet();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramNangorInfo()
    {
        try {
            $data = $this->instagramService->getRecentPostNangorInfo();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function getInstagramTrifantasia()
    {
        try {
            $data = $this->instagramService->getRecentPostTrifantasia();
            return Laramap::list(InstagramMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
