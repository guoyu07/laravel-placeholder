<?php
/**
 * TagTrait.php.
 *
 * This file is part of the laravel-placeholder.
 *
 * (c) sqrtqiezi <njin.cool@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sqrtqiezi\LaravelPlaceholder\Drivers;

trait TagTrait
{
    /**
     * @param mixed $tagClass
     * @return string
     */
    private function createTagClass($tagClass)
    {
        if (is_array($tagClass)) {
            return ' class="' . implode(' ', $tagClass) . '"';
        }
        if (is_string($tagClass)) {
            return " class=\"$tagClass\"";
        }
        return '';
    }

    /**
     * Get Image Tag
     *
     * @param integer $width
     * @param integer $height
     * @param mixed $tagClass
     * @return string
     */
    public function tag($width = null, $height = null, $tagClass = null)
    {
        $tagClass = $this->createTagClass($tagClass);

        return '<img src="' . $this->url($width, $height) . '"' . $tagClass . ' />';
    }
}