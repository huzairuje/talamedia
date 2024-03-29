<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', function () {
   return redirect()->route('login');
});

Route::get('admin', function () {
    return redirect()->route('login');
});

Route::get('dashboard', function () {
    return redirect()->route('login');
});

Route::get('admin/dashboard', function () {
    return redirect()->route('login');
});


Route::group(['prefix' => 'admin' ,'middleware' => 'auth'], function() {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

# RoleController
    Route::get('role', ['as' => 'role.index', 'uses' => 'Backend\RoleController@index']);
    Route::get('role/datatables', ['as' => 'role.datatables', 'uses' => 'Backend\RoleController@dataTables']);
    Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'Backend\RoleController@show']);
    Route::get('role/create', ['as' => 'role.create', 'uses' => 'Backend\RoleController@create']);
    Route::post('role/create', ['as' => 'role.store', 'uses' => 'Backend\RoleController@store']);
    Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'Backend\RoleController@edit']);
    Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'Backend\RoleController@update']);
    Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'Backend\RoleController@destroy']);
    Route::resource('role', 'Backend\RoleController');

# MenuController
    Route::get('menu', ['as' => 'menu.index', 'uses' => 'Backend\MenuController@index']);
    Route::get('menu/datatables', ['as' => 'menu.datatables', 'uses' => 'Backend\MenuController@dataTables']);
    Route::get('menu/show/{id}', ['as' => 'menu.show', 'uses' => 'Backend\MenuController@show']);
    Route::get('menu/create', ['as' => 'menu.create', 'uses' => 'Backend\MenuController@create']);
    Route::post('menu/create', ['as' => 'menu.store', 'uses' => 'Backend\MenuController@store']);
    Route::get('menu/edit/{id}', ['as' => 'menu.edit', 'uses' => 'Backend\MenuController@edit']);
    Route::put('menu/edit/{id}', ['as' => 'menu.update', 'uses' => 'Backend\MenuController@update']);
    Route::get('menu/delete/{id}', ['as' => 'menu.delete', 'uses' => 'Backend\MenuController@destroy']);
    Route::resource('menu', 'Backend\MenuController');

# UserController
    Route::get('user', ['as' => 'user.index', 'uses' => 'Backend\UserController@index']);
    Route::get('user/datatables', ['as' => 'user.datatables', 'uses' => 'Backend\UserController@dataTables']);
    Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'Backend\UserController@show']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'Backend\UserController@create']);
    Route::post('user/create', ['as' => 'user.store', 'uses' => 'Backend\UserController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Backend\UserController@edit']);
    Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'Backend\UserController@update']);
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'Backend\UserController@destroy']);
    Route::resource('user', 'Backend\UserController');


# ArticleController
    Route::get('article', ['as' => 'article.index', 'uses' => 'Backend\ArticleController@index']);
    Route::get('article/datatables', ['as' => 'article.datatables', 'uses' => 'Backend\ArticleController@dataTables']);
    Route::get('article/show/{id}', ['as' => 'article.show', 'uses' => 'Backend\ArticleController@show']);
    Route::get('article/create', ['as' => 'article.create', 'uses' => 'Backend\ArticleController@create']);
    Route::post('article/create', ['as' => 'article.store', 'uses' => 'Backend\ArticleController@store']);
    Route::get('article/edit/{id}', ['as' => 'article.edit', 'uses' => 'Backend\ArticleController@edit']);
    Route::put('article/update/{id}', ['as' => 'article.update', 'uses' => 'Backend\ArticleController@update']);
    Route::get('article/delete/{id}', ['as' => 'article.delete', 'uses' => 'Backend\ArticleController@destroy']);
    Route::resource('article', 'Backend\ArticleController');

# ArticleCategoryController
    Route::get('articlecategory', ['as' => 'articlecategory.index', 'uses' => 'Backend\ArticleCategoryController@index']);
    Route::get('articlecategory/datatables', ['as' => 'articlecategory.datatables', 'uses' => 'Backend\ArticleCategoryController@dataTables']);
    Route::get('articlecategory/show/{id}', ['as' => 'articlecategory.show', 'uses' => 'Backend\ArticleCategoryController@show']);
    Route::get('articlecategory/create', ['as' => 'articlecategory.create', 'uses' => 'Backend\ArticleCategoryController@create']);
    Route::post('articlecategory/create', ['as' => 'articlecategory.store', 'uses' => 'Backend\ArticleCategoryController@store']);
    Route::get('articlecategory/edit/{id}', ['as' => 'articlecategory.edit', 'uses' => 'Backend\ArticleCategoryController@edit']);
    Route::put('articlecategory/update/{id}', ['as' => 'articlecategory.update', 'uses' => 'Backend\ArticleCategoryController@update']);
    Route::get('articlecategory/delete/{id}', ['as' => 'articlecategory.delete', 'uses' => 'Backend\ArticleCategoryController@destroy']);
    Route::resource('articlecategory', 'Backend\ArticleCategoryController');

# ArticleTagController
    Route::get('articletag', ['as' => 'articletag.index', 'uses' => 'Backend\ArticleTagController@index']);
    Route::get('articletag/datatables', ['as' => 'articletag.datatables', 'uses' => 'Backend\ArticleTagController@dataTables']);
    Route::get('articletag/show/{id}', ['as' => 'articletag.show', 'uses' => 'Backend\ArticleTagController@show']);
    Route::get('articletag/create', ['as' => 'articletag.create', 'uses' => 'Backend\ArticleTagController@create']);
    Route::post('articletag/create', ['as' => 'articletag.store', 'uses' => 'Backend\ArticleTagController@store']);
    Route::get('articletag/edit/{id}', ['as' => 'articletag.edit', 'uses' => 'Backend\ArticleTagController@edit']);
    Route::put('articletag/update/{id}', ['as' => 'articletag.update', 'uses' => 'Backend\ArticleTagController@update']);
    Route::get('articletag/delete/{id}', ['as' => 'articletag.delete', 'uses' => 'Backend\ArticleTagController@destroy']);
    Route::resource('articletag', 'Backend\ArticleTagController');

# AdvertController
    Route::get('advert', ['as' => 'advert.index', 'uses' => 'Backend\AdvertController@index']);
    Route::get('advert/datatables', ['as' => 'advert.datatables', 'uses' => 'Backend\AdvertController@dataTables']);
    Route::get('advert/show/{id}', ['as' => 'advert.show', 'uses' => 'Backend\AdvertController@show']);
    Route::get('advert/create', ['as' => 'advert.create', 'uses' => 'Backend\AdvertController@create']);
    Route::post('advert/create', ['as' => 'advert.store', 'uses' => 'Backend\AdvertController@store']);
    Route::get('advert/edit/{id}', ['as' => 'advert.edit', 'uses' => 'Backend\AdvertController@edit']);
    Route::put('advert/update/{id}', ['as' => 'advert.update', 'uses' => 'Backend\AdvertController@update']);
    Route::get('advert/delete/{id}', ['as' => 'advert.delete', 'uses' => 'Backend\AdvertController@destroy']);
    Route::resource('advert', 'Backend\AdvertController');

# AdvertCategoryController
    Route::get('advertcategory', ['as' => 'advertcategory.index', 'uses' => 'Backend\AdvertCategoryController@index']);
    Route::get('advertcategory/datatables', ['as' => 'advertcategory.datatables', 'uses' => 'Backend\AdvertCategoryController@dataTables']);
    Route::get('advertcategory/show/{id}', ['as' => 'advertcategory.show', 'uses' => 'Backend\AdvertCategoryController@show']);
    Route::get('advertcategory/create', ['as' => 'advertcategory.create', 'uses' => 'Backend\AdvertCategoryController@create']);
    Route::post('advertcategory/create', ['as' => 'advertcategory.store', 'uses' => 'Backend\AdvertCategoryController@store']);
    Route::get('advertcategory/edit/{id}', ['as' => 'advertcategory.edit', 'uses' => 'Backend\AdvertCategoryController@edit']);
    Route::put('advertcategory/update/{id}', ['as' => 'advertcategory.update', 'uses' => 'Backend\AdvertCategoryController@update']);
    Route::get('advertcategory/delete/{id}', ['as' => 'advertcategory.delete', 'uses' => 'Backend\AdvertCategoryController@destroy']);
    Route::resource('advertcategory', 'Backend\AdvertCategoryController');

# PageStaticController
    Route::get('pagestatic',  ['as' => 'pagestatic.index', 'uses' => 'Backend\PageStaticController@index']);
    Route::get('pagestatic/datatables',  ['as' => 'pagestatic.datatables', 'uses' => 'Backend\PageStaticController@dataTables']);
    Route::get('pagestatic/show/{id}',  ['as' => 'pagestatic.show', 'uses' => 'Backend\PageStaticController@show']);
    Route::get('pagestatic/create',  ['as' => 'pagestatic.create', 'uses' => 'Backend\PageStaticController@create']);
    Route::post('pagestatic/create',  ['as' => 'pagestatic.store', 'uses' => 'Backend\PageStaticController@store']);
    Route::get('pagestatic/edit/{id}',  ['as' => 'pagestatic.edit', 'uses' => 'Backend\PageStaticController@edit']);
    Route::put('pagestatic/update/{id}',  ['as' => 'pagestatic.update', 'uses' => 'Backend\PageStaticController@update']);
    Route::get('pagestatic/delete/{id}',  ['as' => 'pagestatic.delete', 'uses' => 'Backend\PageStaticController@destroy']);

# PodcastController
    Route::get('podcasts',  ['as' => 'podcasts.index', 'uses' => 'Backend\PodcastController@index']);
    Route::get('podcasts/datatables',  ['as' => 'podcasts.datatables', 'uses' => 'Backend\PodcastController@dataTables']);
    Route::get('podcasts/create',  ['as' => 'podcasts.create', 'uses' => 'Backend\PodcastController@create']);
    Route::post('podcasts/create',  ['as' => 'podcasts.store', 'uses' => 'Backend\PodcastController@store']);
    Route::get('podcasts/edit/{id}',  ['as' => 'podcasts.edit', 'uses' => 'Backend\PodcastController@edit']);
    Route::put('podcasts/update/{id}',  ['as' => 'podcasts.update', 'uses' => 'Backend\PodcastController@update']);
    Route::get('podcasts/delete/{id}',  ['as' => 'podcasts.delete', 'uses' => 'Backend\PodcastController@destroy']);

# PodcastEpisodeController
    Route::get('podcastepisodes',  ['as' => 'podcastepisodes.index', 'uses' => 'Backend\PodcastEpisodeController@index']);
    Route::get('podcastepisodes/datatables',  ['as' => 'podcastepisodes.datatables', 'uses' => 'Backend\PodcastEpisodeController@dataTables']);
    Route::get('podcastepisodes/show/{id}',  ['as' => 'podcastepisodes.show', 'uses' => 'Backend\PodcastEpisodeController@show']);
    Route::get('podcastepisodes/create',  ['as' => 'podcastepisodes.create', 'uses' => 'Backend\PodcastEpisodeController@create']);
    Route::post('podcastepisodes/create',  ['as' => 'podcastepisodes.store', 'uses' => 'Backend\PodcastEpisodeController@store']);
    Route::get('podcastepisodes/edit/{id}',  ['as' => 'podcastepisodes.edit', 'uses' => 'Backend\PodcastEpisodeController@edit']);
    Route::put('podcastepisodes/update/{id}',  ['as' => 'podcastepisodes.update', 'uses' => 'Backend\PodcastEpisodeController@update']);
    Route::get('podcastepisodes/delete/{id}',  ['as' => 'podcastepisodes.delete', 'uses' => 'Backend\PodcastEpisodeController@destroy']);

});
