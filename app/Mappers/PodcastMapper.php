<?php


namespace App\Mappers;


use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class PodcastMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $podcast
     * @return array|mixed
     */
    function single($podcast)
    {
        return [
            "id" => $podcast->id,
            "listen_note_podcast_id" => $podcast->listen_note_podcast_id,
            "title" => $podcast->title,
            "publisher" => $podcast->publisher,
            "image_url_listen_note" => $podcast->thumbnail_url_listen_note,
            "thumbnail_url_listen_note" => $podcast->thumbnail_url_listen_note,
            "description" => $podcast->description,
            "country" => $podcast->country,
            "language" => $podcast->language,
            "explicit_content" => $podcast->explicit_content == 1 ? true : false
        ];
    }
}
