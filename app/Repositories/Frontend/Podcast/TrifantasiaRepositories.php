<?php


namespace App\Repositories\Frontend\Podcast;

use App\Models\Podcast;
use App\Models\PodcastEpisode;

class TrifantasiaRepositories
{
    private $podcastModel;
    private $podcastEpisodeModel;
    private $listenNotePodcastId;

    public function __construct(Podcast $podcastModel,
                                PodcastEpisode $podcastEpisodeModel)
    {
        $this->podcastModel = $podcastModel;
        $this->podcastEpisodeModel = $podcastEpisodeModel;
        $this->listenNotePodcastId = env('LISTEN_NOTE_TRIFANTASIA_PODCAST_ID');
    }

    /**
     * get meta data Trifantasia from database
     */
    public function getTrifantasiaProfile()
    {
        $trifantasiaPodcastId = $this->listenNotePodcastId;
        $trifantasiaProfile = Podcast::where('listen_note_podcast_id', '=', $trifantasiaPodcastId)->firstOrFail();
        return $trifantasiaProfile;

    }

    /**
     * get All Episode data Trifantasia from database
     */
    public function getTrifantasiaAllEpisodes()
    {
        $episode = PodcastEpisode::orderBy('created_at', 'desc')->paginate(10);
        return $episode;
    }

    /**
     * get Episode By Id data Trifantasia from database
     * @param $id
     * @return string
     */
    public function getTrifantasiaEpisodeById($id)
    {
        $episode = PodcastEpisode::findOrFail($id);
        return $episode;
    }

}
