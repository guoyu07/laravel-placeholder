<?php
/**
 * UnsplashDriver.php.
 *
 * This file is part of the laravel-placeholder.
 *
 * (c) sqrtqiezi <njin.cool@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sqrtqiezi\LaravelPlaceholder\Drivers;


/**
 * Class UnsplashDriver
 * @package Sqrtqiezi\LaravelPlaceholder\Drivers
 */
class UnsplashDriver implements PlaceholderInterface
{
    use TagTrait;

    protected $baseUrl = 'https://unsplash.it/';

    /**
     * Get URL for Unsplash.it
     *
     * @param integer $width
     * @param integer $height
     * @return string
     * @throws \InvalidArgumentException
     */
    public function url($width = null, $height = null)
    {
        if ((null !== $width && !is_int($width)) ||
            (null !== $height && !is_int($height))
        ) {
            throw new \InvalidArgumentException('Placeholder\'s width and height only accept integer!');
        }

        $path = [];
        if (config('placeholder.grayscale')) {
            $path[] = 'g';
        }
        if (null === $width) {
            $width = config('placeholder.default_width');
        }
        if (null === $height) {
            $path[] = (string)$width;
        } else {
            $path[] = (string)$width;
            $path[] = (string)$height;
        }

        $params = [];
        if (config('placeholder.blur')) {
            $params[] = 'blur';
        }
        if (config('placeholder.random')) {
            $params[] = 'random';
        }

        return $this->baseUrl . implode('/', $path) . '?' . implode('&', $params);
    }

}