<?php
/**
 * PlaceholderInterface.php.
 *
 * This file is part of the laravel-placeholder.
 *
 * (c) sqrtqiezi <njin.cool@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sqrtqiezi\LaravelPlaceholder\Drivers;


interface PlaceholderInterface
{
    public function url();

    public function tag();
}