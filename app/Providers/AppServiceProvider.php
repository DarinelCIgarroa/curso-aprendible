<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        /*Definimos un gate con nombre create-projects que recibe como
         parametro en la funcion el usuario actualemnte logueado en caso de a ver uno*/
         // return $user->email === 'darinelcigarroa97@gmail.com';
        // Gate::define('create-projects', function($user){
        //     return $user->role === 'admin';
        // });
        Gate::define('listDeleteProjects', function($user)
        {
            return $user->role === 'admin';
        });
    }
}
