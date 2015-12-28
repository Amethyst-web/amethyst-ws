<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 16:34
 */

namespace models;

use Exception;
use core\BaseModel;

class Users extends BaseModel
{
    public $name;
    public $email;
    public $pass;
    public $salt;
    public $token;
    public $authTime;
    public $authenticated;
    public $removed;
    public $createdAt;

    public static function getTableName() {
        return 'users';
    }

    public function generateToken() {
        $this->authTime = time();
        $this->token = md5($this->authTime.$this->salt.$this->id);
        $this->authenticated = 1;
        $this->save();
        return $this->token;
    }

    public function checkAuth($token = null){
        if($token === null) return false;
        if($this->authenticated == false) return false;
        return $this->token === $token;
    }

    protected function update() {
        $prep = static::$con->prepare('UPDATE '.static::getTableName().' SET email = ?, name = ?, pass = ?, salt = ?, token = ?, authenticated = ?, auth_time = ?, removed = ? WHERE id = ?');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->pass,
            $this->salt,
            $this->token,
            $this->authenticated,
            $this->authTime,
            $this->removed,
            $this->id
        ]);
    }

    protected function insert() {
        throw new Exception('Функция '.__FUNCTION__.' не описана');
    }
}