<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 13:07
 */

namespace controllers;

use core\BaseController;
use models\Users;

class AuthController extends BaseController
{
    protected function render($layout = 'authLayout', $view = null){
        parent::render($layout, $view);
    }

    public function indexAction(){
        if($this->checkAuth()){
            $this->goToRoute('home');
        }
        $this->render();
    }

    public function logoutAction(){
        $user = new Users($_COOKIE['UID']);
        $user->authenticated = 0;
        $user->authTime = null;
        $user->token = null;
        $user->save();
        setcookie('UID', '');
        setcookie('token', '');
        $this->goToRoute('auth');
    }

    public function loginAction(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            return $this->errorJSONResponse('Метод не доступен с этим HTTP-методом', 403);
        }
        if(!isset($_POST['email'], $_POST['pass'])){
            return $this->errorJSONResponse('Не хватает одного из параметров', 500);
        }
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        /** @var Users $user */
        $user = Users::getOne(['email' => $email]);
        if(!$user || ($user->pass !== md5($user->salt.$pass.$user->salt))){
            return $this->errorJSONResponse('Такого пользователя не существует', 501);
        }
        return $this->successJSONResponse(
            'Пользователь успешно авторизован',
            ['UID' => $user->id, 'token' => $user->authenticated == 1 ? $user->token : $user->generateToken()]
        );
    }
}