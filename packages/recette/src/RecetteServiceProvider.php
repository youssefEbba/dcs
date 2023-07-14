<?php
namespace Dcs\Recette;
use Illuminate\Support\ServiceProvider;
class RecetteServiceProvider extends ServiceProvider
{

    public function boot()
    {
       $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
       $this->loadViewsFrom(__DIR__.'/resources/views','recette');
       $this->loadMigrationsFrom(__DIR__.'/database/migrations');
       $this->mergeConfigFrom(__DIR__ . '/config/recette.php','recette');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'recette');
        /*$router = $this->app['router'];
        $router->middlewareGroup('roles', [CheckRole::class]);*/
        /*$router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', MyMiddleware::class);*/
        $this->publishes([
            __DIR__ . '/config/recette.php' => config_path('dcs/recette.php'),
        ]);
        // composer dump-autoload
     // pour publier config
       // php artisan vendor:publish
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/dcs/recette'),
        ], 'public');


        //  pour publier Asset
        // php artisan vendor:publish --tag=public --force

    }
    public function register()
    {

    }

}
