<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1','namespace'=>'API\Front'], function () {

    //Article
    Route::get('articles', 'ArticleController@getAllArticle')->name('articles');
    Route::get('articles/{slug}', 'ArticleController@getArticleBySlug')->name('articleBySlug');
    Route::get('article/{id}', 'ArticleController@getArticleById')->name('articleById');
    Route::get('articles-by-category/{slug}', 'ArticleController@getArticleByCategory')->name('articleByCategory');
    Route::get('articles-featured', 'ArticleController@getArticleFeatured')->name('articleByCategory');
    Route::get('articles-category', 'ArticleController@getArticleCategory')->name('articleCategory');

    //Advert
    Route::get('adverts', 'AdvertController@getAllAdvert');
    Route::get('adverts/featured', 'AdvertController@getAdvertFeatured');
    Route::get('adverts/category', 'AdvertController@getAdvertOnCategory');
    Route::get('adverts/article', 'AdvertController@getAdvertOnArticlePage');
    Route::get('adverts/{slug}', 'AdvertController@getAdvertSingle');
    Route::get('advert/{id}', 'AdvertController@getAdvertById');

    //Instagram
    Route::get('instagram/talamedia', 'InstagramController@getInstagramTalamedia')->name('instagramTalamedia');
    Route::get('instagram/info-unpad', 'InstagramController@getInstagramInfoUnpad')->name('instagramInfoUnpad');
    Route::get('instagram/info-itb', 'InstagramController@getInstagramInfoItb')->name('instagramInfoItb');
    Route::get('instagram/nangor-info', 'InstagramController@getInstagramNangorInfo')->name('instagramNangorInfo');
    Route::get('instagram/bdg-net', 'InstagramController@getInstagramBdgNet')->name('instagramBdgNet');
    Route::get('instagram/trifantasia', 'InstagramController@getInstagramTrifantasia')->name('instagramTrifantasia');

    //Podcast
    Route::get('podcasts', 'PodcastController@getAllPodcast')->name('allPodcast');
    Route::get('podcasts/{title}', 'PodcastController@getPodcastsByTitle')->name('getPodcastByTitle');
    Route::get('podcast/{id}', 'PodcastController@getPodcastById')->name('PodcastById');
    Route::get('podcasts/{title}/episodes', 'PodcastController@getAllEpisodesByPodcastTitle')->name('PodcastByTitle');
    Route::get('podcasts/{title}/episodes/{id}', 'PodcastController@getEpisodePodcastById')->name('PodcastByTitle');
    Route::get('save-podcast-trifantasia', 'PodcastController@saveMetaDataTrifantasia')->name('podcastTrifantasiaEpisodes');

    //Page Static
    Route::get('pages', 'PageStaticController@getAllPageStatic')->name('getAllPageStatic');
    Route::get('pages/{name}', 'PageStaticController@getPageStaticByName')->name('getPageStaticBySlug');
    Route::get('page/{id}', 'PageStaticController@getPageStaticById')->name('getPageStaticById');

});

