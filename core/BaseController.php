<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:28
 */

namespace core;


use models\Users;

abstract class BaseController extends Routing
{
    protected $user;
    protected $currentPage;

    protected function render($layout = 'layout', $view = null){
        if($view === null) $view = $_GET['action'];
        $content = VIEWS_PATH.$_GET['controller'].'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует: '.$content);
        }
        require VIEWS_PATH.$layout.'.php';
    }

    protected function errorJSONResponse($error, $code = 500){
        return $this->JSONResponse([
            'result' => false,
            'code' => $code,
            'error' => $error
        ]);
    }

    protected function successJSONResponse($message, $data = [], $code = 200){
        return $this->JSONResponse([
            'result' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    private function JSONResponse($response){
        header('Content-type: application/json');
        return json_encode($response);
    }

    protected function checkAuth(){
        if(!isset($_COOKIE['UID'], $_COOKIE['token'])) return false;
        $UID = $_COOKIE['UID'];
        $token = $_COOKIE['token'];
        $this->user = new Users($UID);
        if($this->user && $this->user->checkAuth($token)){
            return true;
        } else {
            $this->user = null;
            return false;
        }
    }
}