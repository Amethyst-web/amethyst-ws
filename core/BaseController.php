<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:28
 */

namespace core;


use core\modules\routing\Routing;
use models\Users;

abstract class BaseController extends Routing
{
    /** @var Request */
    protected $request;

    protected $user;

    /**
     * Выполняется до основного action'a
     * @param Request $request
     */
    public function beforeAction(Request $request){
        $this->request = $request;
    }

    /**
     * Рендерит визуалку
     * @param string $layout - основной шаблон
     * @param null $view - визуалка. Если null, берётся визуалка по названию action'a
     */
    protected function render($layout = 'layout', $view = null){
        if($view === null) {
            $view = substr_replace($this->request->route->action, '', strrpos($this->request->route->action, 'Action'));
        }
        $controllerName = substr_replace($this->request->route->controller, '', strrpos($this->request->route->controller, 'Controller'));
        $content = $_SERVER['DOCUMENT_ROOT'].'/../bundles/'.$this->request->route->bundle.'/views/'.$controllerName.'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует: '.$content);
        }
        require $_SERVER['DOCUMENT_ROOT'].'/../bundles/'.$this->request->route->bundle.'/views/'.$layout.'.php';
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