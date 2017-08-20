<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 12.08.17
 * Time: 12:35
 */

namespace application;

use PDO;
use PDOException;

class DB
{

    private $pdoClass = 'PDO';
    private $attributes = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    /**
     * @var PDO
     */
    private $_connection;

    private static $instance = null;

    /**
     * @return DB
     */
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
        $config = Config::get('db');
        try {
            $dsn = strtolower($config['type'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname']);
            $this->_connection = new $this->pdoClass($dsn, $config['user'], $config['password'], $this->attributes);
            var_dump(new $this->pdoClass($dsn, $config['user'], $config['password'], $this->attributes));exit;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            exit;
        }
    }



    public function query($query)
    {
        try {
            $statement = $this->_connection->prepare($query); // preparing query to execute
            $statement->execute();
            //var_dump($this->_connection);exit;
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return ($result) ?: null;
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }


    public function insert($table, array $value)
    {

        try {
            $count = count($value);
            $keys = implode(',', array_keys($value));
            $values = substr(str_repeat('?,', $count), 0, -1);
            $query = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $keys, $values);
            $statement = $this->_connection->prepare($query);
            return $statement->execute(array_values($value));
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }




    /*public function update($table, array $fields, array $conditions)
    {
        $values = implode(' = ?,', array_keys($fields)) . ' = ?';
//
    }*/

    public function update($table, array $fields, array $conditions)
    {
        try {
            $values = implode(' = ? ,', array_keys($fields)) . ' = ?';
            $where = implode(' = ? AND ', array_keys($conditions)) . ' = ?';
            $query = sprintf("UPDATE %s SET %s WHERE %s", $table, $values, $where);
            $statement = $this->_connection->prepare($query);
            $values = array_merge(array_values($fields), array_values($conditions));
            return $statement->execute($values);
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }

    public function getOneBy($table,array $conditions)
    {
        try {
            $where = implode(' = ? AND ', array_keys($conditions)) . ' = ?';
            $query = sprintf("SELECT * FROM %s WHERE %s", $table,$where);

            $statement = $this->_connection->prepare($query);
            //var_dump($statement);exit;
            $statement->execute(array_values($conditions));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return ($result) ?: null;
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }
    public function getAll()
    {
        $posts = $this->_connection->query("Select * FROM 'genres'");
        var_dump($posts);exit;
        $sql = "Select * FROM $this->tbName";
        //var_dump($sql);exit;
        $allPosts = $posts->query($sql);

        return $allPosts;
    }



}