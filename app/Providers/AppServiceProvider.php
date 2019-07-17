<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            if (Auth::user()->name=='admin') {
                return 1;
            }
            return 0;
        });

        Blade::if('article', function () {
            if (Auth::user()->name=='admin_article' || Auth::user()->name=='admin') {
                return 1;
            }
            return 0;
        });

        Blade::if('advert', function () {
            if (Auth::user()->name=='admin_advert' || Auth::user()->name=='admin') {
                return 1;
            }
            return 0;
        });
    }
}
