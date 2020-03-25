<?php

namespace Socieboy\FileManager;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FileManagerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'socieboy');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'filemanager');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->defineRoutes();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Define the Sanctum routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware('web')
        ->prefix(config('filemanager.prefix'))
        ->group(__DIR__.'/routes.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/filemanager.php', 'filemanager');

        // Register the service the package provides.
        $this->app->singleton('filemanager', function ($app) {
            return new FileManager();
        });

        require_once __DIR__ . '/helpers.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['filemanager'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/filemanager.php' => config_path('filemanager.php'),
        ], 'filemanager.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/socieboy'),
        ], 'filemanager.views');*/

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/build' => public_path('vendor/filemanager'),
        ], 'filemanager.assets');


        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/socieboy'),
        ], 'filemanager.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
