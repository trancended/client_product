<?php
declare(strict_types=1);

namespace Trancended\ClientProduct;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ClientProductServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * @var string
     */
    protected $namespace = 'Trancended\ClientProduct\Http\Controllers';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
         $this->app->booted(function () {
            $this->setupRoutes($this->app->router);
         });

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('client_product.php'),
        ], 'client-config');

        $this->loadViewsFrom(__DIR__ . '/views', 'trancended-clientproduct');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router): void
    {

        $router->group(['namespace' => $this->namespace], function ($router) {
            require __DIR__.'/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'client_product');
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return ['client_product'];
    }
}
