<?php
/**
 * PlaceholderManager.php.
 *
 * This file is part of the laravel-placeholder.
 *
 * (c) sqrtqiezi <njin.cool@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sqrtqiezi\LaravelPlaceholder;


use Illuminate\Support\Manager;
use Sqrtqiezi\LaravelPlaceholder\Drivers\PlaceimgDriver;
use Sqrtqiezi\LaravelPlaceholder\Drivers\UnsplashDriver;

class PlaceholderManager extends Manager
{
    /**
     * Return default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['placeholder.service'];
    }

    /**
     * Make unsplash.it Driver
     *
     * @return \Sqrtqiezi\LaravelPlaceholder\Drivers\UnsplashDriver
     */
    public function createUnsplashDriver()
    {
        return new UnsplashDriver();
    }

    /**
     * Make placeimg.com Driver
     *
     * @return \Sqrtqiezi\LaravelPlaceholder\Drivers\PlaceimgDriver
     */
    public function createPlaceimgDriver()
    {
        return new PlaceimgDriver();
    }
}