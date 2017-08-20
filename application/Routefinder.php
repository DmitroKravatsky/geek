<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 19.08.17
 * Time: 0:58
 */

namespace application;


class Routefinder
{
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __construct()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', "", $path);
        $routes = explode('/', $path);
        if ($routes[0] = 'admin'){

        }
    }
}