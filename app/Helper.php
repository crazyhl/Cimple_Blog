<?php

namespace App;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 2016/8/24
 * Time: 22:24.
 */
class Helper
{
    public static function parseHtml($value)
    {
        $parser = new MarkdownExtra();
        $value = $parser->transform($value);
        $value = SmartyPants::defaultTransform($value);

        return $value;
    }
}
