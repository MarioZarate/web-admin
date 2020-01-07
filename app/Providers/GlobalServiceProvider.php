<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{CorporativoB2, EstructuraA, EstructuraB, EstructuraC, Info, Negocio, Huella};
// use App\Information;

class GlobalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*' , function($view) {
            $global['STATIC_URL'] = '/static/';
            $global['info'] = Info::first();
            
            $view->with($global);
        });
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
