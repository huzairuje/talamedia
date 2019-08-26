<?php


namespace App\Repositories\Frontend\Podcast;


use App\Models\Podcast;
use App\Models\PodcastEpisode;

class BasePodcastRepositories
{
    private $podcastModel;
    private $podcastEpisodeModel;

    public function __construct(Podcast $podcastModel,
                                PodcastEpisode $podcastEpisodeModel)
    {
        $this->podcastModel = $podcastModel;
        $this->podcastEpisodeModel = $podcastEpisodeModel;
    }

    /**
     * Get All Podcasts
     * @return object
     */
    public function getAllPodcasts()
    {
        $data = Podcast::orderBy('created_at', 'desc')->paginate(10);
        return $data;
    }

    /**
     * Get Podcasts By Id
     * @param $id
     * @return object
     */
    public function getPodcastsById($id)
    {
        $data = Podcast::find($id);
        return $data;
    }

    /**
     * Get Podcasts By Title
     * @param $title
     * @return array
     */
    public function getPodcastsByTitle($title)
    {
        $data = Podcast::where('title', 'like', '%' . $title . '%')->first();
        return $data;
    }

    public function getPodcastEpisodeById($id)
    {
        $data = PodcastEpisode::find($id);
        return $data;
    }

    public function searchPodcast($keyword)
    {
        $data = Podcast::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', '%' .  $keyword . '%')
                ->orWhere('publisher', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('country', 'like', '%' . $keyword . '%')
                ->orWhere('language', 'like', '%' . $keyword . '%');
        })->paginate();

        return $data;
    }

}
