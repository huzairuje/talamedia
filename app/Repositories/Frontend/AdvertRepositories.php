<?php


namespace App\Repositories\Frontend;

use App\Models\Advert;
use Illuminate\Support\Facades\DB;

class AdvertRepositories
{
    protected $advert;

    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }

    public function getAdvert()
    {
        $advert = DB::table('advert')->select('*')->get();
        return $advert;
    }

    public function getAdvertBySlug($slug)
    {
        $advertPage = Advert::where('name', '=', $slug)->firstOrFail();
        return $advertPage;
    }

    public function getAdvertById($id)
    {
        $advertPageId = Advert::findOrFail($id);
        return $advertPageId;
    }

    public function getAdvertFeatured()
    {
        $article = $this->advert->where('is_featured_advert', '=', 1)->orderBy('created_at', 'desc');
        return $article;
    }

    public function getAdvertOnArticlePage()
    {
        $advert = $this->advert->where('is_on_article_page', '=', 1)->orderBy('created_at', 'desc');
        return $advert;
    }

    public function getAdvertOnCategoryPage()
    {
        $advert = $this->advert->where('is_on_category_page', '=', 1)->orderBy('created_at', 'desc');
        return $advert;
    }

}
