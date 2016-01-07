<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 03.01.2016
 * Time: 11:36
 */

namespace front\controllers;


use core\BaseController;
use core\Mailer;
use core\Request;
use core\modules\validators\EmailValidator;
use models\Subscribers;

class defaultController extends BaseController
{
    public function indexAction(){
        $this->render();
    }

    public function subscribeAction(Request $request){
        if(($email = $request->post('email')) === null){
            return $this->errorJSONResponse('Не определён email');
        }
        if((new EmailValidator())->validate($email) === false){
            return $this->errorJSONResponse('Не верный email. Email должен быть вида example@smth.com');
        }
        $subscriber = Subscribers::getOne(['email' => $email]);
        if($subscriber !== false){
            return $this->errorJSONResponse('Вы уже подписаны на нашу рассылку', 501);
        }
        $subscriber = new Subscribers();
        $subscriber->email = $email;
//        $mailSent = (new Mailer())->send();
        $mailSent = true;
        if(!$mailSent || $subscriber->save() !== true){
            return $this->errorJSONResponse('Не удалось подписаться. Попробуйте позже.'.$mailSent ? ' Письмо отправлено по ошибке.' : '');
        }
        return $this->successJSONResponse('Подписка успешно оформлена! Уже в ближайшем будущем ждите интересных новостей и предложений!');
    }
}