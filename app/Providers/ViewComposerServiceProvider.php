<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    { 
        $this->composeNavigation();
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
    
    /**
     * Compose the Navigation bar
     *
     */
    private function composeNavigation()
    {
        view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer@compose');
    }
}
