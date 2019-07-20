<?php


namespace App\Services\Frontend;

use App\Models\ArticleCategory;
use Vinkla\Instagram\Instagram as VinklaInstagram;

class InstagramService
{
    protected $articleCategories;

    public function __construct(ArticleCategory $articleCategories)
    {
        $this->articleCategories = $articleCategories;
    }

    /**
     * get Recent Post Talamedia from instagram
     * @return array
     */
    public function getRecentPostTalamedia()
    {
        /**
         * post token to instagram
         */
        $instagram = new VinklaInstagram('5356087785.e92ff04.598dc31af5a04c67900bf6b47c9f5b02');

        /**
         * get recent media
         */
        $media = $instagram->media(['count' => 12]);

        return $media;

    }


    /**
     * get Recent Post From Info Unpad Instagram
     */
    public function getRecentPostInfoUnpad()
    {
        /**
         * post token to instagram
         */
        $accessToken = ArticleCategory::where('name', '=', 'InfoKampus')->first();
        $accessToken = $accessToken->instagram_access_token_1;

        $instagram = new VinklaInstagram($accessToken);
        $media = $instagram->media();

        return $media;

    }

    /**
     * get Recent Post From Info ITB Instagram
     */
    public function getRecentPostInfoItb()
    {
        /**
         * post token to instagram
         */
        $accessToken = ArticleCategory::where('name', '=', 'InfoKampus')->first();
        $accessToken = $accessToken->instagram_access_token_2;

        $instagram = new VinklaInstagram($accessToken);
        $media = $instagram->media();

        return $media;

    }

    /**
     * get Recent Post From BdgNetijen
     */
    public function getRecentPostBdgNet()
    {
        /**
         * post token to instagram
         */
        $accessToken = ArticleCategory::where('name', '=', 'RuangKota')->first();
        $accessToken = $accessToken->instagram_access_token_1;

        $instagram = new VinklaInstagram($accessToken);
        $media = $instagram->media();

        return $media;
    }

    /**
     * get Recent Post From BdgNetijen
     */
    public function getRecentPostNangorInfo()
    {
        /**
         * post token to instagram
         */
        $accessToken = ArticleCategory::where('name', '=', 'RuangKota')->first();
        $accessToken = $accessToken->instagram_access_token_2;

        $instagram = new VinklaInstagram($accessToken);
        $media = $instagram->media();

        return $media;
    }

    /**
     * get Recent Post From BdgNetijen
     */
    public function getRecentPostTrifantasia()
    {
        /**
         * post token to instagram
         */
        $accessToken = ArticleCategory::where('name', '=', 'Podcast')->first();
        $accessToken = $accessToken->instagram_access_token_1;

        $instagram = new VinklaInstagram($accessToken);
        $media = $instagram->media();

        return $media;
    }

}
