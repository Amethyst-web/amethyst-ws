<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 03.01.2016
 * Time: 11:36
 */

namespace front\controllers;


use core\BaseController;

class defaultController extends BaseController
{
    public function indexAction(){
        $this->render();
    }

    public function subscribeAction(){

    }
}