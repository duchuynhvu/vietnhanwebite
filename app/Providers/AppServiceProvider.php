<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('client_links') && Schema::hasTable('information') && Schema::hasTable('news_categories')) {
            $clients = \App\ClientLink::take(9)->get();
            $info = \App\Information::first();
            $geo = $info->getCoordinates($info->address);
            $categories = \App\NewsCategory::all();
            View::share([
                'clients' => $clients,
                'info' => $info,
                'geo' => $geo,
                'hotline' => $info->hotline,
                'categories' => $categories
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
