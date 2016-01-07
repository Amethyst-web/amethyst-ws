<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 05.01.2016
 * Time: 12:14
 */

namespace core;


use core\modules\routing\Route;

class Request
{
    /** @var array фильтрованый массив $_GET */
    protected $get;
    /** @var array фильтрованый массив $_POST */
    protected $post;
    /** @var array фильтрованый массив $_GET + $_POST */
    protected $request;

    /** @var string метод GET, POST и т.д. */
    public $method;

    /** @var Route роут */
    public $route;

    function __construct(Route $route)
    {
        $this->route = $route;
        $this->method = $_SERVER['REQUEST_METHOD'];
        if(($this->get = filter_input_array(INPUT_GET)) === null) {
            $this->get = [];
        }
        if(($this->post = filter_input_array(INPUT_POST)) === null) {
            $this->post = [];
        }
        $this->request = array_merge($this->get, $this->post);
    }

    public function post($key = null){
        if($key === null){
            return $this->post;
        }
        if(isset($this->post[$key])){
            return $this->post[$key];
        } else {
            return null;
        }
    }

    public function get($key = null){
        if($key === null){
            return $this->get;
        }
        if(isset($this->get[$key])){
            return $this->get[$key];
        } else {
            return null;
        }
    }

    public function request($key = null){
        if($key === null){
            return $this->request;
        }
        if(isset($this->request[$key])){
            return $this->request[$key];
        } else {
            return null;
        }
    }
}