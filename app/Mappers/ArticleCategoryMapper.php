<?php


namespace App\Mappers;

use Illuminate\Support\Facades\Storage;
use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class ArticleCategoryMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $articleCategory
     * @return array|mixed
     */
    function single($articleCategory)
    {
        return [
            "id" => $articleCategory->id,
            "name" => $articleCategory->name,
            "featured_image" => url('/').Storage::url('images/'.$articleCategory->featured_image),
            "status" => $articleCategory->status == 1 ? true : false,
            "instagram_access_token_1" => $articleCategory->instagram_access_token_1,
            "instagram_access_token_2" => $articleCategory->instagram_access_token_2,
            "instagram_access_token_3" => $articleCategory->instagram_access_token_3,
            "slug" => $articleCategory->slug,
            "created_at" => $articleCategory->created_at,
            "updated_at" => $articleCategory->updated_at,
        ];
    }
}
