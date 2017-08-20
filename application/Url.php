<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 14.08.17
 * Time: 1:25
 */

namespace application;


class Url
{
    private static $currentDomain;

    public static function toRoute($route,array $parrams = array())
    {
        static::setDomain();
        $url = static::$currentDomain . $route;
        if(!empty($parrams)){
            $url .= static::parrams($parrams);
        }
        //var_dump($url); exit;
        return $url;
    }

    private static function setDomain()
    {
        //var_dump($_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . '/'); exit;
        static::$currentDomain .= '/';
    }

    private static function parrams(array $parrams)
    {
        return '?'. implode('/',$parrams);
    }
}