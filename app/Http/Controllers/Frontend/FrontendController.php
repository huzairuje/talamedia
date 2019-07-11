<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Instagram;
use App\Models\Pages;

class FrontendController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {

        //get all Pages on navbar
//        $pages = Pages::all();
//
//        //get feed instagram
//        $instagram = new Instagram("5356087785.e92ff04.598dc31af5a04c67900bf6b47c9f5b02");
//
//        //for recent media  uplaod by user
//        $instagrams = $instagram->media();

        return view('frontend.index'
//            ,compact('google_analytics', 'pages', 'instagrams')
        );
    }

    /**
     * show page by $slug.
     * @param $slug
     * @param PagesRepository $pagesRepository\
     * @param Page $page
     * @throws
     * @return View
     */
//    public function showPage($slug, PagesRepository $pagesRepository, Page $page)
//    {
//        $result = $pagesRepository->findBySlug($slug);
//
//        //get all Pages on navbar
//        $pages = Page::all();
//
//        //if instagram_access_token_1 is null just return to page with just nothing content
//        if (empty($result->instagram_access_token_1)) {
//
//            return view('frontend.pages.index',
//                compact('result', 'pages'));
//
//        }elseif (empty($result->instagram_access_token_2)) {
//
//            $contentInstagramFirst = new Instagram($result->instagram_access_token_1);
//            $imageInstagramFirst = $contentInstagramFirst->media();
//
//            return view('frontend.pages.index',
//                compact('result', 'pages', 'imageInstagramFirst'));
//
//        } else {
//
//            //Get AccessToken For 2 AccesToken
//            $contentInstagramFirst = new Instagram($result->instagram_access_token_1);
//            $contentInstagramSecond = new Instagram($result->instagram_access_token_2);
//
//            //for recent media  upload by user
//            $imageInstagramFirst = $contentInstagramFirst->media();
//            $imageInstagramSecond = $contentInstagramSecond->media();
//
//            return view('frontend.pages.index',
//                compact('result', 'pages', 'imageInstagramFirst', 'imageInstagramSecond'));
//
//        }

//    }
}
