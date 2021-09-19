<?php

namespace App\Providers;

use App\Models\Navigation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Navigation $navigation)
    {
        View::composer('basic._navigation-top', function($view) use($navigation) {
            $view->with([
                'navMenu'     => $navigation->listMenu(),
            ]);
        });
        View::composer('basic._navigation-sidebar', function($view) use($navigation) {
            $view->with([
                'sidebarMenu' => $navigation->sidebarMenu(),
            ]);
        });
    }
}
