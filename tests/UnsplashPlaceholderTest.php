<?php

namespace Sqrtqiezi\LaravelPlaceholder\Tests;

use InvalidArgumentException;
use Orchestra\Testbench\TestCase;
use Sqrtqiezi\LaravelPlaceholder\PlaceholderServiceProvider;

class UnsplashPlaceholderTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('placeholder', require __DIR__ . '/../src/config/placeholder.php');
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
    public function get_unsplash_url()
    {
        $this->assertSame(
            'https://unsplash.it/100?random',
            $this->app['placeholder']->url(100)
        );
    }

    /** @test */
    public function get_unsplash_full_url()
    {
        $this->app['config']->set('placeholder.blur', 'true');
        $this->app['config']->set('placeholder.grayscale', 'true');
        $this->assertSame(
            'https://unsplash.it/g/640/360?blur&random',
            $this->app['placeholder']->url(640, 360)
        );
    }


    /** @test */
    public function get_unsplash_tag()
    {
        $this->assertSame(
            '<img src="https://unsplash.it/100?random" />',
            $this->app['placeholder']->tag(100)
        );
    }

    /** @test */
    public function get_unsplash_tag_with_class()
    {
        $this->assertSame(
            '<img src="https://unsplash.it/100?random" class="img-responsive" />',
            $this->app['placeholder']->tag(100, null, $tagClass = 'img-responsive')
        );
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function try_unsplash_tag_with_invalid_argument()
    {
        $this->app['placeholder']->tag('large');
    }
}