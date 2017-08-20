<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 19.08.17
 * Time: 22:12
 */

namespace admin\Model;


use application\DB;

class Genres
{
    public $tbName = "genres";

    public function getAll()
    {

        $posts = DB::getInstance();

        //$sql = "Select * FROM $this->tbName";

        //$allPosts = $posts->query($sql);

       // return $allPosts;
    }
}