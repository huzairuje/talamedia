<?php

namespace App\Http\Controllers\API\Front;

use App\Mappers\ArticleMapper;
use App\Mappers\PodcastMapper;
use App\Repositories\Frontend\ArticleRepositories;
use App\Repositories\Frontend\Podcast\BasePodcastRepositories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Thomzee\Laramap\Facades\Laramap;

class SearchController extends Controller
{
    protected $articleRepositories;
    protected $basePodcastRepositories;

    public function __construct(ArticleRepositories $articleRepositories,
                                BasePodcastRepositories $basePodcastRepositories)
    {
        $this->articleRepositories = $articleRepositories;
        $this->basePodcastRepositories = $basePodcastRepositories;
    }

    public function searchArticle(Request $request)
    {
        $data = $this->articleRepositories->searchArticle($request->keyword);
        return Laramap::paged(ArticleMapper::class, $data);
    }

    public function searchPodcast(Request $request)
    {
        $data = $this->basePodcastRepositories->searchPodcast($request->keyword);
        return Laramap::paged(PodcastMapper::class, $data);
    }
}
