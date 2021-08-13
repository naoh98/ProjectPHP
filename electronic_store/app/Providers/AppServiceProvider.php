<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        //
        $this->app['request']->server->set('HTTPS','on');
        //
        view()->composer('frontend.partials.nav', function ($view){
           $view->with('menu', DB::table('category')->get());
        });
    }
}
