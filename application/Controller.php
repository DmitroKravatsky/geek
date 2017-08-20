<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 12:27
 */

namespace application;


class Controller
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View();
        $this->db = DB::getInstance();
    }

    protected function getConnection()
    {
        return $this->db;
    }

    protected function render($scriptName, array $params = array())
    {
        return $this->view->render($scriptName, $params);
    }

    protected function redirect($url){
        header("Location: {$url}");
        exit;
    }
}