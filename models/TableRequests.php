<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 29.11.2015
 * Time: 22:54
 */

namespace models;

use DateTime;

use core\BaseModel;

class TableRequests extends BaseModel
{
    public $name;
    public $email;
    public $phone;
    public $date;
    public $comment;
    public $createdAt;

    public static function getTableName() {
        return 'table_requests';
    }

    public static function getAllForPeriod(DateTime $from = null, DateTime $to = null){
        if($from === null && $to === null){
            return static::getAll();
        }
        $conditions = [];
        $args = [];
        if($from !== null){
            $conditions[] = 'DATE(date) >= ?';
            $args[] = $from->format('Y-m-d');
        }
        if($to !== null){
            $conditions[] = 'DATE(date) <= ?';
            $args[] = $to->format('Y-m-d');
        }
        $prep = static::$con->prepare('SELECT * FROM '.static::getTableName().' WHERE '.join($conditions, ' AND '));
        $prep->execute($args);
        return $prep->fetchAll();
    }

    protected function insert() {
        $this->id = static::$con->insert('INSERT INTO '.static::getTableName().' (email, name, phone, date, `comment`) VALUES (?,?,?,?,?)', [
            $this->email,
            $this->name,
            $this->phone,
            $this->date,
            $this->comment
        ]);
        return $this->id !== false;
    }

    protected function update() {
        $prep = static::$con->prepare('UPDATE '.static::getTableName().' SET email = ?, name = ?, phone = ?, date = ?,`comment` = ? WHERE id = ?');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->phone,
            $this->date,
            $this->comment,
            $this->id
        ]);
    }
}