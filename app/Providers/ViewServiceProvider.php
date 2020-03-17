<?php

namespace App\Providers;

use App\Http\View\Composer\ResourceComposer;
use App\Http\View\Composer\UserHeaderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('resources', ResourceComposer::class);
        View::composer('header.user', UserHeaderComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
