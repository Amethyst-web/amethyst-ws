<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 03.01.2016
 * Time: 15:59
 */

namespace core\modules\routing;

use core\Request;
use Exception;

class Route extends \PHPRouter\Route
{
    protected $controllerClass;
    public $controller;
    public $action;
    public $bundle;

    function __construct($resource, array $config)
    {
        $controller = explode('::', $config['_controller']);
        $this->controller = $controller[0];
        if(!isset($controller[1])){
            throw new Exception('Не определён экшн');
        }
        $this->bundle = $config['bundle'];
        $this->action = $controller[1];
        $this->controllerClass = $config['namespace'].$this->controller;
        $config['_controller'] = $config['namespace'].$config['_controller'];
        parent::__construct($resource, $config);
    }

    public function dispatch()
    {
        if(!class_exists($this->controllerClass)){
            throw new Exception('Такого контроллера не существует: '.$this->controllerClass);
        }
        $selectedController = new $this->controllerClass();
        $parameters = $this->getParameters();
        $parameters['request'] = new Request($this);
        $this->setParameters($parameters);
        if(method_exists($selectedController, 'beforeAction')){
            call_user_func_array(array($selectedController, 'beforeAction'), $parameters);
        }
        if(!method_exists($selectedController, $this->action)) {
            throw new Exception('Нет такого action\'a: '.$this->action);
        }
        call_user_func_array(array($selectedController, $this->action), $parameters);
        if(method_exists($selectedController, 'afterAction')){
            call_user_func_array(array($selectedController, 'afterAction'), $parameters);
        }
    }
}