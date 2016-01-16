<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.11.2015
 * Time: 16:32
 */

header('Content-Type: text/html; charset=utf-8');
require '../vendor/autoload.php';

define('DEV', true);

if(DEV){
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

use config\App;
use core\modules\routing\Routing;

$routing = new Routing();
try{
    $route = $routing->checkPath();
} catch(Exception $ex){
    die('Ошибка проверки роута: '.$ex->getMessage());
}
if($route === false){
    $routing->goToRoute('front', 'home');
}