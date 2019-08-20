<?php


namespace App\Mappers;


use Illuminate\Support\Facades\Storage;
use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class ListPageStaticMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $page
     * @return array|mixed
     */
    function single($page)
    {
        return [
            "id" => $page->id,
            "name" => $page->name,
            "featured_image" => url('/').Storage::url('images/'.$page->featured_image),
            "created_by" => $page->user->name,
            "created_by_username_instagram" => $page->user->username_instagram,
            "status" => $page->status,
            "created_at" => $page->created_at,
        ];
    }
}
