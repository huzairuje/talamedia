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

}
