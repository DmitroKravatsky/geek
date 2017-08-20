<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 22:52
 */

namespace src\Model;


use application\DB;
use application\Model;

class Tasks extends Model
{

    public $dbName = 'tasks';
    public $id;
    public $task;
    public $description;
    public $name;

    public function __construct($id='',$task='',$description='',$name='')
    {
        $this->id = $id;
        $this->task = $task;
        $this->description = $description;
        $this->name = $name;
    }

    public function getAll($limit = 3,$offset = 0)
    {
        $cntSql = "SELECT count(id) as cnt FROM $this->dbName";
        $posts = DB::getInstance();
        $count =$posts->query($cntSql);
        $sql = "Select * FROM $this->dbName ORDER BY id desc";
        $sql .= " LIMIT {$offset}, {$limit}";
        $allPosts = $posts->query($sql);
        //var_dump($allPosts);exit;
        return array($allPosts,$count [0]['cnt']);

    }

    public function sortedBy($condition,$limit = 3,$offset = 0)
    {
        $posts = DB::getInstance();
        $count =$posts->query("SELECT count($condition) as cnt FROM $this->dbName");

        $sql = "SELECT * FROM $this->dbName WHERE $condition != '' ORDER BY $condition";
        $sql .= " LIMIT {$offset}, {$limit}";

        $sorted = $posts->query($sql);
        //echo '<pre>'; var_dump($sorted);exit;
        //echo '<pre>' ; var_dump($sorted); exit;
        return array($sorted,$count [0]['cnt']);
    }

    /*public function getOneBy($table,$condition)
    {
        $posts = DB::getInstance();
        $db = $posts->query("Select * FROM $table WHERE $condition");
        return $db;
    }*/

    public function insert($table,array $text)
    {
        $db = DB::getInstance();
        $db->insert($table,$text);
        return true;
    }

    public function update($table, array $fields, array $conditions)
    {
        $db = DB::getInstance();
        $res = $db->update($table, $fields, $conditions);

        return ($res == true) ? true: false;
    }

    /*public function resize($file,$maxWidth,$maxHeigh)
    {
        if ($file['type'] == 'image/jpeg')
        $source = imagecreatefromjpeg ($file['tmp_name']);

        elseif ($file['type'] == 'image/png')

        $source = imagecreatefrompng ($file['tmp_name']);

        elseif ($file['type'] == 'image/gif')

        $source = imagecreatefromgif ($file['tmp_name']);
        else

        return false;
        $src = imagerotate($source, 0, 0);
        $w_src = imagesx($src);
        $h_src = imagesy($src);

    }*/

}