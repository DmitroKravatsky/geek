<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 11:18
 */

namespace application;

use InvalidArgumentException;
use ReflectionClass;

class Route
{
    private $defaultController = 'site';
    private $defaultAction = 'index';

    private $pathToControllers = '\\src\\Controller\\';

    protected $controller;
    protected $action;

    public function run()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', "", $path);
        $routes = explode('/', $path);
        //var_dump($routes); exit();
        switch ($routes[0]){
            case "admin":
                //var_dump($routes); exit();
                $this->pathToControllers = '\\admin\\Controller\\';
                $this->setController($routes[0])->setAction($routes[1]);
                Config::set('controller',$this->defaultController);
                Config::set('action',$this->defaultAction);
                $this->executeFunc();
                break;

            case !null:
                //var_dump($routes); exit();
                $this->setController($routes[0])->setAction($routes[1]);
                Config::set('controller',$routes[0]);
                Config::set('action',$routes[1]);
            //var_dump($this->controller,$this->action); exit();
                $this->executeFunc();
            break;

            default :
                $this->setController($this->defaultController)->setAction($this->defaultAction);
                Config::set('controller',$this->defaultController);
                Config::set('action',$this->defaultAction);
                $this->executeFunc();
                break;


        }
    }

    private function setController($controller)
    {

        $controller = $this->pathToControllers . ucfirst(strtolower($controller)) . "Controller";
        //var_dump($controller);exit;

        if (!class_exists($controller)) {

            throw new InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;

        return $this;
    }


    private function setAction($action)
    {

        $reflector = new ReflectionClass($this->controller);
        $action = 'action' . $action;
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }

    private function executeFunc()
    {
        call_user_func_array(array(new $this->controller, $this->action), array());
    }

    public function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}