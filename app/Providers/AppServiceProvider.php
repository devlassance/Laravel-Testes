<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//ferramenta para criação de valores globais
use Illuminate\Support\Facades\View;

//Usando components 
use Illuminate\Support\Facades\Blade;

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
        //criando um valor global
        View::share('version', '1.0');

        //Informando pasta e nome do components
        Blade::component('components.alert', 'alert');
    }
}
