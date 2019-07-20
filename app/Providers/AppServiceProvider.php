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

        /**
         * With Role
         */
        Blade::if('admin', function () {
            $roles = Auth::user()->role()->get();
            foreach ($roles as $role) {
                $nameRole = $role->name;
                if ($nameRole == 'super_admin') {
                    return 1;
                }
                return 0;
            }
        });

        Blade::if('article', function () {
            $roles = Auth::user()->role()->get();
            foreach ($roles as $role) {
                $nameRole = $role->name;
                if ($nameRole == 'admin_article' || $nameRole == 'super_admin') {
                    return 1;
                }
                return 0;
            }
        });

        Blade::if('advert', function () {

            $roles = Auth::user()->role()->get();
            foreach ($roles as $role) {
                $nameRole = $role->name;
                if ($nameRole == 'admin_advert' || $nameRole == 'super_admin') {
                    return 1;
                }
                return 0;
            }
        });
    }

}
