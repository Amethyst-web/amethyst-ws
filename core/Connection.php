<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 19:25
 */

namespace core;

use config\DB;
use PDO;
use PDOException;

class Connection extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct('mysql:host=' . DB::HOST . ';dbname=' . DB::NAME, DB::USER, DB::PASS, [
                parent::ATTR_ERRMODE => parent::ERRMODE_EXCEPTION,
                parent::ATTR_DEFAULT_FETCH_MODE => parent::FETCH_ASSOC,
                parent::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
        } catch (PDOException $ex){
            die('Не удалось установить соединение с БД: '.$ex->getMessage());
        }
    }

    public function insert($query, $params){
        $prep = $this->prepare($query);
        $result = $prep->execute($params);
        if($result){
            $id = $this->lastInsertId();
        }
        return isset($id) ? $id : false;
    }

    public function executeQuery($query){
        $prep = $this->prepare($query);
        $prep->execute();
        return $prep->fetchAll();
    }
}