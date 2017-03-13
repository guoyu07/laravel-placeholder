<?php

namespace Sqrtqiezi\LaravelPlaceholder\Tests;

use Orchestra\Testbench\TestCase;
use Sqrtqiezi\LaravelPlaceholder\PlaceholderServiceProvider;

class PlaceimgPlaceholderTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('placeholder', require __DIR__ . '/../src/config/placeholder.php');
        $app['config']->set('placeholder.service', 'placeimg');
    }

    protected function getPackageProviders($app)
    {
        return [PlaceholderServiceProvider::class];
    }

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function get_placeimg_url()
    {
        $this->assertSame(
            'https://placeimg.com/100/100/any',
            $this->app['placeholder']->url(100)
        );
    }

    /** @test */
    public function get_placeimg_full_url()
    {
        $this->app['config']->set('placeholder.grayscale', 'true');
        $this->assertSame(
            'https://placeimg.com/100/100/any/grayscale',
            $this->app['placeholder']->url(100)
        );
    }
}