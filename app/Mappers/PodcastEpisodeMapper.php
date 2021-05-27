<?php


namespace App\Mappers;


use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class PodcastEpisodeMapper extends BaseMapper implements MapperContract
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
            "podcast_by" => $episode->podcast->title,
            "listen_note_episode_id" => $episode->listen_note_episode_id,
            "title" => $episode->title,
            "description" => $episode->description,
            "listen_note_audio_url" => $episode->listen_note_audio_url,
            "audio_length_in_second" => $episode->audio_length_in_second,
            "image_url_listen_note" => $episode->image_url_listen_note,
            "thumbnail_url_listen_note" => $episode->thumbnail_url_listen_note,
            "explicit_content" => $episode->explicit_content == 1 ? true : false
        ];
    }
}
