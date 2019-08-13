<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\TrifantasiaListEpisodeMapper;
use App\Mappers\TrifantasiaPodcastMapper;
use App\Services\Frontend\Podcast\TrifantasiaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Thomzee\Laramap\Facades\Laramap;
use Exception;

class PodcastController extends Controller
{
    protected $trifantasiaService;
    protected $apiBaseResponse;

    public function __construct(TrifantasiaService $trifantasiaService,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->trifantasiaService = $trifantasiaService;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getTrifantasiaMetaData()
    {
        try {
            $data = $this->trifantasiaService->getAllMetaDataTrifantasia();
            return Laramap::single(TrifantasiaPodcastMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getTrifantasiaEpisodes()
    {
        try {
            $data = $this->trifantasiaService->getAllMetaDataTrifantasia();
            $getEpisodes = $data->episodes;
            return Laramap::list(TrifantasiaListEpisodeMapper::class, $getEpisodes);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
