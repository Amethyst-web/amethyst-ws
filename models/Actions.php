<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 21:28
 */

namespace models;

use core\BaseModel;

class Actions extends BaseModel
{
    public $name;
    public $short_text;
    public $main_image;
    public $detail_image;
    public $text;
    public $start_at;
    public $end_at;
    public $forever = 0;
    public $visible = 1;
    public $removed = 0;
    public $changed_by;
    public $created_at;
    public $updated_at;

    public static function getTableName() {
        return 'actions';
    }

    public static function getAllNotRemoved(){
        static::getConnection();
        return static::$con->executeQuery('SELECT * FROM '.static::getTableName().' WHERE removed = 0');
    }

    public static function getActive(){
        static::getConnection();
        return static::$con->executeQuery('SELECT * FROM '.static::getTableName().' WHERE (DATE(start_at) <= DATE(now()) AND (DATE(end_at) >= DATE(now()) OR forever = 1)) AND removed = 0 AND visible = 1');
    }

    protected function insert(){
        $this->created_at = date('Y-m-d H:i:s');
        $this->id = static::$con->insert('INSERT INTO '.static::getTableName().' (
                name,
                main_image,
                detail_image,
                short_text,
                text,
                start_at,
                end_at,
                forever,
                visible,
                removed,
                changed_by) VALUES (?,?,?,?,?,?,?,?,?,?,?)', [
            $this->name,
            $this->main_image,
            $this->detail_image,
            $this->short_text,
            $this->text,
            $this->start_at,
            $this->end_at,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changed_by
        ]);
        return $this->id !== false;
    }

    public function save()
    {
        if(!isset($_COOKIE['UID'], $_COOKIE['token'])) {
            throw new \Exception('Попытка сохранения без авторизации!');
        }
        $this->changed_by = $_COOKIE['UID'];
        return parent::save();
    }

    protected function update(){
        $prep = static::$con->prepare('UPDATE '.static::getTableName().'
            SET name = ?,
                main_image = ?,
                detail_image = ?,
                short_text = ?,
                text = ?,
                start_at = ?,
                end_at = ?,
                forever = ?,
                visible = ?,
                removed = ?,
                changed_by = ?
            WHERE id = ?');
        return $prep->execute([
            $this->name,
            $this->main_image,
            $this->detail_image,
            $this->short_text,
            $this->text,
            $this->start_at,
            $this->end_at,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changed_by,
            $this->id
        ]);
    }
}