<?php


namespace App\Mappers;

use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class TrifantasiaPodcastMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $trifantasia
     * @return array|mixed
     */
    function single($trifantasia)
    {
        return [
            "id" => $trifantasia->id,
            "listen_note_podcast_id" => $trifantasia->listen_note_podcast_id,
            "title" => $trifantasia->title,
            "publisher" => $trifantasia->publisher,
            "image_url_listen_note" => $trifantasia->thumbnail_url_listen_note,
            "thumbnail_url_listen_note" => $trifantasia->thumbnail_url_listen_note,
            "description" => $trifantasia->description,
            "country" => $trifantasia->country,
            "language" => $trifantasia->language,
            "explicit_content" => $trifantasia->explicit_content == 1 ? true : false
        ];
    }
}
