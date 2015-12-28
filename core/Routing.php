<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 29.11.2015
 * Time: 20:31
 */

namespace core;

use Exception;

abstract class Routing extends \config\Routing
{
    public static function getPath($routeName){
        if(!isset(static::$routes[$routeName])){
            throw new Exception('Такого роута не существует');
        }
        return static::$routes[$routeName];
    }

    public static function goToRoute($routeName){
        static::redirect(static::getPath($routeName));
    }

    public static function redirect($link){
        header('Location: '.$link);
        exit;
    }
}