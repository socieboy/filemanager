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
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
    }

    /**
     * Register the File Manager routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('filemanager.path'),
            'namespace' => 'Socieboy\FileManager\Http\Controllers',
            'middleware' => config('filemanager.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Register the File Manager resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filemanager');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    protected function defineAssetPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                FILEMANAGER_PATH . '/public' => public_path('vendor/filemanager'),
            ], 'filemanager-assets');
        }
    }


    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('FILEMANAGER_PATH')) {
            define('FILEMANAGER_PATH', realpath(__DIR__ . '/../'));
        }

        $this->configure();
        $this->offerPublishing();

        $this->app->singleton('filemanager', function ($app) {
            return new FileManager();
        });

        require_once __DIR__ . '/helpers.php';
    }

    /**
     * Setup the resource publishing groups for Horizon.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/filemanager.php' => config_path('filemanager.php'),
            ], 'filemanager-config');
        }
    }

    /**
     * Setup the configuration for Horizon.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filemanager.php', 'filemanager'
        );
    }
}
