<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 10:36
 */


use application\Route;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once 'config/config.php';
$route = new Route();
$route->run();