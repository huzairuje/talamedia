<?php

use Illuminate\Http\Request;
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
    Route::get('articles', 'ArticleController@getAllArticle')->name('articles');
    Route::get('articles/{slug}', 'ArticleController@getArticleBySlug')->name('articleBySlug');
    Route::get('articles-by-category/{slug}', 'ArticleController@getArticleByCategory')->name('articleByCategory');
    Route::get('articles-featured', 'ArticleController@getArticleFeatured')->name('articleByCategory');
    Route::get('articles-category', 'ArticleController@getArticleCategory')->name('articleCategory');


    Route::get('instagram-talamedia', 'InstagramController@getInstagramTalamedia')->name('instagramTalamedia');

    Route::get('instagram-info-unpad', 'InstagramController@getInstagramInfoUnpad')->name('instagramInfoUnpad');
    Route::get('instagram-info-itb', 'InstagramController@getInstagramInfoItb')->name('instagramInfoItb');

    Route::get('instagram-nangor-info', 'InstagramController@getInstagramNangorInfo')->name('instagramNangorInfo');
    Route::get('instagram-bdg-net', 'InstagramController@getInstagramBdgNet')->name('instagramBdgNet');

    Route::get('instagram-trifantasia', 'InstagramController@getInstagramTrifantasia')->name('instagramTrifantasia');

    //Podcast
    Route::get('podcast-trifantasia', 'PodcastController@getTrifantasiaProfile')->name('podcastTrifantasia');
    Route::get('podcast-trifantasia-episodes', 'PodcastController@getTrifantasiaEpisodes')->name('podcastTrifantasiaEpisodes');
    Route::get('podcast-trifantasia-episodes/{id}', 'PodcastController@getTrifantasiaEpisodeById')->name('podcastTrifantasiaEpisodeById');
    Route::get('save-podcast-trifantasia', 'PodcastController@saveMetaDataTrifantasia')->name('podcastTrifantasiaEpisodes');

//    Route::get('adverts/{slug}', 'AdvertController');
//    Route::get('adverts/{slug}', 'AdvertController');
//    Route::get('adverts/{slug}', 'AdvertController');
});

