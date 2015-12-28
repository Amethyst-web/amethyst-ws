<?php
namespace core;

/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:45
 */

abstract class BaseModel
{
    public $id = -1;
    /** @var Connection $con */
    protected static $con;

    public function __construct($id = null)
    {
        static::getConnection();
        if($id !== null){
            $prep = static::$con->prepare('SELECT * FROM '.static::getTableName().' WHERE id = ? LIMIT 1');
            $prep->execute([$id]);
            $result = $prep->fetch();
            if(!$result) return false;
            $this->parseArray($result);
        }
    }

    public static function getOne($params = []){
        static::getConnection();
        $query = 'SELECT * FROM '.static::getTableName();
        if(sizeof($params) !== 0) {
            $filterString = join(' = ? AND ', array_keys($params)).' = ?';
            $query .= ' WHERE '.$filterString;
        }
        $query.=' LIMIT 1';
        $prep = static::$con->prepare($query);
        $prep->execute(array_values($params));
        return $prep->fetchObject(get_called_class());
    }

    public static function getAll(){
        static::getConnection();
        $prep = static::$con->prepare('SELECT * FROM '.static::getTableName());
        $prep->execute();
        return $prep->fetchAll();
    }

    public function save() {
        return ($this->id !== null && $this->id > 0) ? $this->update() : $this->insert();
    }

    protected abstract function update();
    protected abstract function insert();

    protected static function getConnection(){
        if(!isset(static::$con)){
            static::$con = new Connection();
        }
        return static::$con;
    }

    private function parseArray($values = []){
        foreach($values as $key => $value){
            if(property_exists(get_class($this), $key)){
                $this->{$key} = $value;
            }
        }
    }
}