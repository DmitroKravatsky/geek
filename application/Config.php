<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 10:00
 */
namespace application;

class Config
{

    private static $conf = array();

    /**
     * @param string $name
     * @param array|string|int $value
     */
    public static function set($name, $value)
    {
        if (!isset(self::$conf[$name])) {
            self::$conf[$name] = $value;
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function get($name)
    {
        return (!isset(self::$conf[$name])) ? null : self::$conf[$name];
    }

}