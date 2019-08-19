<?php


namespace App\Repositories\Frontend;

use App\Http\Library\ApiBaseResponse;
use App\Models\Advert;

class AdvertRepositories
{
    protected $advert;
    protected $responseLib;

    public function __construct(Advert $advert, ApiBaseResponse $responseLib)
    {
        $this->advert = $advert;
        $this->responseLib = $responseLib;
    }

    public function getAdvert()
    {
        $advert = Advert::orderBy('created_at', 'desc')->paginate(10);
        return $advert;
    }

    public function getAdvertBySlug($slug)
    {
        $advertPage = Advert::where('name', 'like', '%' . $slug . '%')->first();
        return $advertPage;

    }

    public function getAdvertById($id)
    {
        $advertPageId = Advert::find($id)->first();
        return $advertPageId;
    }

    public function getAdvertFeatured()
    {
        $article = $this->advert->where('is_featured_advert', '=', 1)->orderBy('created_at', 'desc')->paginate(6);
        return $article;
    }

    public function getAdvertOnArticlePage()
    {
        $advert = $this->advert->where('is_on_article_page', '=', 1)->orderBy('created_at', 'desc')->paginate(6);
        return $advert;
    }

    public function getAdvertOnCategoryPage()
    {
        $advert = $this->advert->where('is_on_category_page', '=', 1)->orderBy('created_at', 'desc')->paginate(6);
        return $advert;
    }

}
