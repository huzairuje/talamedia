<?php


namespace App\Services\Frontend\Podcast;


use GuzzleHttp\Client;

class TrifantasiaService
{
    private $client;
    private $listenNoteApiBaseUrl;
    private $listenNoteApiKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->listenNoteApiBaseUrl = env('LISTEN_NOTE_API_BASE_URL');
        $this->listenNoteApiKey = env('LISTEN_NOTE_API_KEY');
    }

    /**
     * get data directly from listen note API
     * see https://www.listennotes.com/api/
     * or the API docs https://www.listennotes.com/api/docs/
     * @return mixed
     */
    public function getAllMetaDataTrifantasia()
    {
        $response = $this->client
            ->get($this->listenNoteApiBaseUrl.'podcasts/'.'41db8df60df342bc87d9054989d29a10',
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
        //TODO
    }

    /**
     * get meta data Trifantasia from database
     */
    public function getTrifantasiaProfile()
    {
        //TODO
    }

    /**
     * get All Episode data Trifantasia from database
     */
    public function getTrifantasiaAllEpisodes()
    {
        //TODO
    }

    /**
     * get Episode By Id data Trifantasia from database
     * @param $id
     */
    public function getTrifantasiaEpisodeById($id)
    {
        //TODO
    }
}
