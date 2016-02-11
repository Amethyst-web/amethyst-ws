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
use core\modules\validators\PhoneValidator;
use core\modules\validators\StringValidator;
use core\Request;
use core\modules\validators\EmailValidator;
use models\Subscribers;

class defaultController extends BaseController
{
    /**
     * Главная
     */
    public function indexAction(){
        $this->render();
    }

    /**
     * Заглушка
     */
    public function capAction(){
        $this->render();
    }

    public function addRequestAction(Request $request){
        if(($email = $request->post('email')) === null ||
            ($name = $request->post('name')) === null ||
            ($phone = $request->post('phone')) === null){
            return $this->errorJSONResponse('Не определён один из параметров');
        }
        if((new EmailValidator())->validate($email) === false){
            return $this->errorJSONResponse('Не верный email. Email должен быть вида example@example.com');
        }
        if((new PhoneValidator())->validate($phone) === false){
            return $this->errorJSONResponse('Не верный телефон. Email должен быть вида +7(123)456-78-90');
        }
        if((new StringValidator())->validate($name) === false){
            return $this->errorJSONResponse('Имя не может быть пустым или больше 50 символов');
        }
        $subscriber = Subscribers::getOne(['email' => $email]);
        if($subscriber !== false){
            return $this->errorJSONResponse('Вы уже подписаны на нашу рассылку', 501);
        }
        $subscriber = new Subscribers();
        $subscriber->email = $email;
        $subscriber->name = $name;
        $subscriber->phone = $phone;
        if($subscriber->save()){
            return $this->successJSONResponse('Заявка успешно оформлена! В ближайшее время с Вами свяжется наш менеджер!');
        } else {
            return $this->successJSONResponse('Не удалось оформить заявку! Попробуйте позже.');
        }
    }

    public function subscribeAction(Request $request){
        if(($email = $request->post('email')) === null){
            return $this->errorJSONResponse('Не определён email');
        }
        if((new EmailValidator())->validate($email) === false){
            return $this->errorJSONResponse('Не верный email. Email должен быть вида example@example.com');
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