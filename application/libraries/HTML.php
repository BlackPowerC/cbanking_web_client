<?php

/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 05/04/18
 * Time: 11:26
 */

defined('BASEPATH') or exit("No direct script allowed") ;
defined('DIRECTORY_SEPARATOR') or exit("") ;

class HTML
{
    public static function style(string $style)
    {
        return base_url().'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$style.'.css' ;
    }

    public static function script(string $js)
    {
        return base_url().'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$js.'.js' ;
    }

    public static function img(string $img)
    {
        return base_url().'application'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$img ;
    }
}
