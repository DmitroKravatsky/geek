<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 17:53
 */

namespace application;

use application\DB;


class Model extends DB
{
    public $dbName ;
    public $paginator = array();

    public function getAll()
    {
        $posts = DB::getInstance();
        $db = $posts->query("Select * FROM $this->dbName");
        return $db;
    }

    public function getOneBy($table,array $conditions)
    {
        //var_dump(1);exit;
        $posts = DB::getInstance();
        $db = $posts->getOneBy($table,$conditions);
        return $db;
    }



}