<?php
/**
 * PlaceholderServiceProvider.php.
 *
 * This file is part of the laravel-placeholder.
 *
 * (c) sqrtqiezi <njin.cool@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sqrtqiezi\LaravelPlaceholder;

use Illuminate\Support\ServiceProvider;

/**
 * Class PlaceholderServiceProvider
 *
 * @package Sqrtqiezi\LaravelPlaceholder
 */
class PlaceholderServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/placeholder.php', 'placeholder');
        $this->app->singleton('placeholder', function ($app) {
            return new PlaceholderManager($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/placeholder.php' => config_path('placeholder.php'),
        ], 'config');
    }
}