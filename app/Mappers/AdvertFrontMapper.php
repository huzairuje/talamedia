<?php


namespace App\Mappers;


use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class AdvertFrontMapper extends BaseMapper implements MapperContract
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
            "featured_image" => $advert->featured_image,
            "created_at" => $advert->created_at,
            "is_featured" => $advert->is_featured_advert
        ];
    }
}
