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
            "title" => $trifantasia->title,
            "publisher" => $trifantasia->publisher,
            "image" => $trifantasia->image,
            "thumbnail" => $trifantasia->thumbnail,
            "description" => $trifantasia->description,
            "country" => $trifantasia->country,
            "language" => $trifantasia->language
        ];
    }
}
