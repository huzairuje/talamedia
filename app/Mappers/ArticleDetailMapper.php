<?php


namespace App\Mappers;

use Illuminate\Support\Facades\Storage;
use Thomzee\Laramap\BaseMapper;
use Thomzee\Laramap\MapperContract;

class ArticleDetailMapper extends BaseMapper implements MapperContract
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
            "content" => $article->content,
            "meta_tittle" => $article->meta_tittle,
            "slug" => $article->slug,
            "meta_keywords" => $article->meta_keywords,
            "meta_description" => $article->meta_description,
            "status" => $article->status,
            "article_category" => $article->category->name,
            "article_tag" => $article->tag,
            "created_at" => $article->created_at,
            "updated_at" => $article->updated_at,
            "created_by" => $article->user->name,

        ];
    }
}
