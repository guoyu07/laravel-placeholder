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


class PlaceimgDriver implements PlaceholderInterface
{
    use TagTrait;

    protected $baseUrl = 'https://placeimg.com/';

    /**
     * Get URL for placeimg.com
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
        if (null === $width) {
            $width = config('placeholder.default_width');
        }
        if (null !== $width && null === $height) {
            $height = $width;
        }
        $path[] = (string)$width;
        $path[] = (string)$height;

        if (config('placeholder.random')) {
            $path[] = 'any';
        }

        if (config('placeholder.grayscale')) {
            $path[] = 'grayscale';
        }

        return $this->baseUrl . implode('/', $path);
    }
}