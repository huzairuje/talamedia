<?php


namespace App\Mappers;


use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class InstagramMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $instagram
     * @return array|mixed
     */
    function single($instagram)
    {
            return [
                "id" => $instagram->id,
                "username" => $instagram->user->username,
                "images" => $instagram->images->thumbnail->url,
                "link" => $instagram->link,
            ];
    }

}
