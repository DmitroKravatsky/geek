<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 12:32
 */

namespace application;


class View
{

    public $template_view;
    private $viewPath = __DIR__ . '/../src/View/';

    public function render($scriptName, array $params = array())
    {
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        require($this->viewPath . $scriptName . '.php');
        echo ob_get_clean();
    }
}