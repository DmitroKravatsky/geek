<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 11:50
 */
use application\Config;

Config::set('db', array(
    'host' => 'localhost',
    'dbname' => 'geek',
    'type' => 'mysql',
    'user' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
));