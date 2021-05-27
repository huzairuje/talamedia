<?php


namespace App\Mappers;

use Illuminate\Support\Facades\Storage;
use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class ArticleMapper extends BaseMapper implements MapperContract
{
    /**
     * Map single object to desired result.
     *
     * @param $article
     * @return array|mixed
     */
    function single($article)
    {
        return [
            "id" => $article->id,
            "name" => $article->name,
            "publish_datetime" => $article->publish_datetime,
            "featured_image" => url('/').Storage::url('images/'.$article->featured_image),
            "slug" => $article->slug,
            "created_by" => $article->user->name,
            "is_featured" => $article->is_featured_article == 1 ? true : false
        ];
    }

}
