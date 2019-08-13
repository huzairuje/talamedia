<?php


namespace App\Mappers;

use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class TrifantasiaListEpisodeMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $episode
     * @return array|mixed
     */
    function single($episode)
    {
        return [
            "id" => $episode->id,
            "title" => $episode->title,
            "description" => $episode->description,
            "audio_url" => $episode->audio,
            "audio_length_in_second" => $episode->audio_length_sec,
            "image" => $episode->image,
            "thumbnail" => $episode->thumbnail,
            "explicit_content" => $episode->explicit_content
        ];
    }
}
