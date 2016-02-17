<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 07.01.2016
 * Time: 15:54
 */

namespace models;


use core\BaseModel;

class Subscribers extends BaseModel
{
    public $email;
    public $name;
    public $phone;
    public $source;

    public static function getTableName() {
        return 'subscribers';
    }

    protected function update() {
        $prep = static::$con->prepare('UPDATE '.static::getTableName().' SET email = ?, name = ?, phone = ?, source = ? WHERE id = ?');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->phone,
            $this->source,
            $this->id
        ]);
    }

    protected function insert() {
        $prep = static::$con->prepare('INSERT INTO '.static::getTableName().' (email, name, phone, source) VALUES (?,?,?,?)');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->phone,
            $this->source
        ]);
    }
}