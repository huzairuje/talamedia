<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Library\ApiBaseResponse;
use App\Mappers\PodcastEpisodeMapper;
use App\Mappers\PodcastMapper;
use App\Repositories\Frontend\Podcast\BasePodcastRepositories;
use App\Repositories\Frontend\Podcast\TrifantasiaRepositories;
use App\Services\Frontend\Podcast\TrifantasiaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Thomzee\Laramap\Facades\Laramap;
use Exception;

class PodcastController extends Controller
{
    protected $trifantasiaService;
    protected $trifantasiaRepositories;
    protected $basePodcastRepositories;
    protected $apiBaseResponse;

    public function __construct(TrifantasiaService $trifantasiaService,
                                TrifantasiaRepositories $trifantasiaRepositories,
                                BasePodcastRepositories $basePodcastRepositories,
                                ApiBaseResponse $apiBaseResponse)
    {
        $this->trifantasiaService = $trifantasiaService;
        $this->trifantasiaRepositories = $trifantasiaRepositories;
        $this->basePodcastRepositories = $basePodcastRepositories;
        $this->apiBaseResponse = $apiBaseResponse;
    }

    public function getAllPodcast()
    {
        try {
            $data = $this->basePodcastRepositories->getAllPodcasts();
            return Laramap::paged(PodcastMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPodcastById($id)
    {
        try {
            $data = $this->basePodcastRepositories->getPodcastsById($id);
            if (!empty($data)) {
                return Laramap::single(PodcastMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPodcastsByTitle($title)
    {
        try {
            $data = $this->basePodcastRepositories->getPodcastsByTitle($title);
            if (!empty($data)) {
                return Laramap::single(PodcastMapper::class, $data);
            }
            $response = $this->apiBaseResponse->notFoundResponse();
            return response($response, Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllEpisodesByPodcastTitle($title)
    {
        try {
            $data = $this->basePodcastRepositories->getPodcastsByTitle($title);
            if (empty($data)) {
                $response = $this->apiBaseResponse->notFoundResponse();
                return response($response, Response::HTTP_NOT_FOUND);
            }
            $dataEpisodes = $data->episode()->orderBy('created_at', 'desc')->paginate();
            return Laramap::paged(PodcastEpisodeMapper::class, $dataEpisodes);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getEpisodePodcastById($title, $id)
    {
        try {
            $data = $this->basePodcastRepositories->getPodcastsByTitle($title);
            if (empty($data)) {
                $response = $this->apiBaseResponse->notFoundResponse();
                return response($response, Response::HTTP_NOT_FOUND);
            }
            $data = $this->basePodcastRepositories->getPodcastEpisodeById($id);
            if (empty($data)) {
                $response = $this->apiBaseResponse->notFoundResponse();
                return response($response, Response::HTTP_NOT_FOUND);
            }
            return Laramap::single(PodcastEpisodeMapper::class, $data);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getEpisodePodcastByTitle($title, $episodeTitle)
    {
        try {
            $data = $this->basePodcastRepositories->getPodcastsByTitle($title);
            if (empty($data)) {
                $response = $this->apiBaseResponse->notFoundResponse();
                return response($response, Response::HTTP_NOT_FOUND);
            }
            $data = $this->basePodcastRepositories->getPodcastEpisodeByTitle($episodeTitle);
            if (empty($data)) {
                $response = $this->apiBaseResponse->notFoundResponse();
                return response($response, Response::HTTP_NOT_FOUND);
            }
            return Laramap::single(PodcastEpisodeMapper::class, $data);
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

    public function redirectUriPodcast(Request $request)
    {
        try {
            $request->validate([
                'url' => 'required',
            ]);
            $data = $this->trifantasiaService->redirectUriListenNote($request->get('url'));
            $response = $this->apiBaseResponse->singleData($data, []);
            return response($response, Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->apiBaseResponse->errorResponse($e);
            return response($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
