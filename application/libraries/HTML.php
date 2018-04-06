<?php

/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 05/04/18
 * Time: 11:26
 */

defined('BASEPATH') or exit("No direct script allowed") ;
defined('BASE_URL') or exit("") ;
defined('DIRECTORY_SEPARATOR') or exit("") ;

class HTML
{
    public static function style(string $style)
    {
        return BASE_URL.'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$style.'.css' ;
    }

    public static function script(string $js)
    {
        return BASE_URL.'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$js.'.js' ;
    }

    public static function img(string $img)
    {
        return BASE_URL.'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$img ;
    }
}