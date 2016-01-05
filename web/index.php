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
    $routing->goToRoute('main', '404');
}

// парсим бандл, контроллер и экшн
//if(empty($_GET['action'])){
//    $_GET['action'] = App::DEFAULT_ACTION;
//    if(empty($_GET['controller'])){
//        $_GET['controller'] = App::DEFAULT_CONTROLLER;
//        if(empty($_GET['bundle'])){
//            $_GET['bundle'] = App::DEFAULT_BUNDLE;
//        }
//    }
//}

//if(empty($_GET['action'])) {
//    $_GET['action'] = App::DEFAULT_ACTION;
//    if(empty($_GET['controller'])) {
//        $_GET['controller'] = App::DEFAULT_ADMIN_CONTROLLER;
//    }
//}
//$controller = $_GET['controller'].'Controller';
//$action = $_GET['action'].'Action';

//парсим GET-параметры
//$params = explode('?',$_SERVER['REQUEST_URI'], 2);
//if(isset($params[1])) {
//    $params = explode('&',$params[1]);
//    foreach ($params as $param) {
//        $values = explode('=', $param, 2);
//        $_GET[$values[0]] = $values[1];
//    }
//}
//
//try{
//    $controllerPath = CONTROLLERS_PATH . $controller . '.php';
//    if(!file_exists($controllerPath)) {
//        throw new Exception($controllerPath);
//    }
//    require $controllerPath;
//    $controllerClass = '\controllers\\'.$controller;
//    if(!class_exists($controllerClass)){
//        throw new Exception($controllerClass);
//    }
//    $selectedController = new $controllerClass();
//} catch(Exception $ex){
//    die('Такого контроллера не существует: '.$ex->getMessage());
//}
//if(method_exists($selectedController, 'beforeAction')){
//    $selectedController->beforeAction();
//}
//if(!method_exists($selectedController, $action)) {
//    die('Нет такого action\'a: '.$action);
//}
//$retData = $selectedController->{$action}();
//if($retData !== null){
//    die($retData);
//}