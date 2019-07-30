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


    Route::get('instagram-talamedia', 'InstagramController@getInstagramTalamedia')->name('articleCategory');

    Route::get('instagram-info-unpad', 'InstagramController@getInstagramInfoUnpad')->name('articleCategory');
    Route::get('instagram-info-itb', 'InstagramController@getInstagramInfoItb')->name('articleCategory');

    Route::get('instagram-nangor-info', 'InstagramController@getInstagramNangorInfo')->name('articleCategory');
    Route::get('instagram-bdg-net', 'InstagramController@getInstagramBdgNet')->name('articleCategory');

    Route::get('instagram-trifantasia', 'InstagramController@getInstagramTrifantasia')->name('articleCategory');

//    Route::get('adverts/{slug}', 'AdvertController');
//    Route::get('adverts/{slug}', 'AdvertController');
//    Route::get('adverts/{slug}', 'AdvertController');
});

