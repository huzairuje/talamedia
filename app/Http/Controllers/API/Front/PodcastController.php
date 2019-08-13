<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\TrifantasiaListEpisodeMapper;
use App\Mappers\TrifantasiaPodcastMapper;
use App\Repositories\Frontend\Podcast\TrifantasiaRepositories;
use App\Services\Frontend\Podcast\TrifantasiaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Thomzee\Laramap\Facades\Laramap;
use Exception;

class PodcastController extends Controller
{
    protected $trifantasiaService;
    protected $trifantasiaRepositories;
    protected $apiBaseResponse;

    public function __construct(TrifantasiaService $trifantasiaService,
                                TrifantasiaRepositories $trifantasiaRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->trifantasiaService = $trifantasiaService;
        $this->trifantasiaRepositories = $trifantasiaRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getTrifantasiaProfile()
    {
        try {
            $data = $this->trifantasiaRepositories->getTrifantasiaProfile();
            return Laramap::single(TrifantasiaPodcastMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getTrifantasiaEpisodes()
    {
        try {
            $data = $this->trifantasiaRepositories->getTrifantasiaAllEpisodes();
            return Laramap::paged(TrifantasiaListEpisodeMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getTrifantasiaEpisodeById($id)
    {
        try {
            $data = $this->trifantasiaRepositories->getTrifantasiaEpisodeById($id);
            return Laramap::single(TrifantasiaListEpisodeMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function saveMetaDataTrifantasia()
    {
        try {
            $data = $this->trifantasiaService->getAndSaveMetaDataTrifantasia();
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
