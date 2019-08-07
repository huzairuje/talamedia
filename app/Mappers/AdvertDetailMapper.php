<?php


namespace App\Mappers;


use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class AdvertDetailMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $advert
     * @return array|mixed
     */
    function single($advert)
    {
        return [
            "name" => $advert->name,
            "content" => $advert->content,
            "featured_image" => $advert->featured_image,
            "created_at" => $advert->created_at,
            "publish_datetime" => $advert->publish_datetime,
        ];
    }
}
