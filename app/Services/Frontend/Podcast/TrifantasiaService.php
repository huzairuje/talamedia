<?php


namespace App\Services\Frontend\Podcast;

use App\Models\Podcast;
use App\Models\PodcastEpisode;
use GuzzleHttp\Client;
use GuzzleHttp\RedirectMiddleware;

class TrifantasiaService
{
    private $client;
    private $listenNoteApiBaseUrl;
    private $listenNoteApiKey;
    private $listenNotePodcastId;
    private $podcastModel;
    private $podcastEpisodeModel;

    public function __construct(Client $client,
                                Podcast $podcastModel,
                                PodcastEpisode $podcastEpisodeModel)
    {
        $this->client = $client;
        $this->podcastModel = $podcastModel;
        $this->podcastEpisodeModel = $podcastEpisodeModel;
        $this->listenNoteApiBaseUrl = env('LISTEN_NOTE_API_BASE_URL');
        $this->listenNoteApiKey = env('LISTEN_NOTE_API_KEY');
        $this->listenNotePodcastId = env('LISTEN_NOTE_TRIFANTASIA_PODCAST_ID');
    }

    /**
     * get data directly from listen note API
     * see https://www.listennotes.com/api/
     * or the API docs https://www.listennotes.com/api/docs/
     * @return mixed
     */

    /**
     * @param $url
     * @return string[]
     */
    public function redirectUriListenNote($url)
    {
        $response = $this->client
            ->get($url, ['allow_redirects' => false]);
        $headersRedirect = $response->getHeader('Location');
        return $headersRedirect;
    }

    public function getAllMetaDataTrifantasia()
    {
        $response = $this->client
            ->get($this->listenNoteApiBaseUrl.'podcasts/'.$this->listenNotePodcastId,
                [
                    'headers' => ['X-ListenAPI-Key' => $this->listenNoteApiKey]
                ]);

        $getBody = $response->getBody();

        $data = json_decode($getBody->getContents());
        return $data;
    }

    /**
     * get and save data to database from response listen note API.
     * this method will be triggered by admin OR cron job.
     */
    public function getAndSaveMetaDataTrifantasia()
    {
        $response = $this->client
            ->get($this->listenNoteApiBaseUrl.'podcasts/'.$this->listenNotePodcastId,
                [
                    'headers' => ['X-ListenAPI-Key' => $this->listenNoteApiKey]
                ]);

        $getBody = $response->getBody();

        $data = json_decode($getBody->getContents());

        $podcast = $this->podcastModel;
        $podcast->listen_note_podcast_id = $data->id;
        $podcast->title = $data->title;
        $podcast->publisher = $data->publisher;
        $podcast->image_url_listen_note = $data->image;
        $podcast->thumbnail_url_listen_note = $data->thumbnail;
        $podcast->description = $data->description;
        $podcast->country = $data->country;
        $podcast->language = $data->language;
        $podcast->rss_url_from_listen_note = $data->rss;
        $podcast->listen_note_url = $data->listennotes_url;
        $podcast->explicit_content = $data->explicit_content;
        $podcast->save();

        /**
         * Give Condition here if the podcast has at least 1 episode
         * if not return just podcast data
         */
        $getEpisodes = $data->episodes;

        if ($getEpisodes != []) {
            foreach ($getEpisodes as $getEpisode)
            {
                $podcastEpisode = new PodcastEpisode();
                $podcastEpisode->podcast_id = $podcast->id;
                $podcastEpisode->listen_note_episode_id = $getEpisode->id;
                $podcastEpisode->title = $getEpisode->title;
                $podcastEpisode->description = $getEpisode->description;
                $podcastEpisode->listen_note_audio_url = $getEpisode->audio;
                $podcastEpisode->audio_length_in_second = $getEpisode->audio_length_sec;
                $podcastEpisode->image_url_listen_note = $getEpisode->image;
                $podcastEpisode->thumbnail_url_listen_note = $getEpisode->thumbnail;
                $podcastEpisode->explicit_content = $getEpisode->explicit_content;
                $podcastEpisode->save();
            }
            return $data;
        } else {
            return $data;
        }
    }

    /**
     * get and update data to database from response listen note API.
     * this method will be triggered by admin OR cron job.
     */
    public function getAndUpdateMetaDataTrifantasia()
    {
        //TODO
    }

}
