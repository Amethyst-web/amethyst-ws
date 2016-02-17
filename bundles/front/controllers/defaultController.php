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
        if(isset($_GET['utm_source'])){
            setcookie('utm_source', $_GET['utm_source']);
        }
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
            return $this->errorJSONResponse('Вы уже заказывали звонок!', 501);
        }
        $subscriber = new Subscribers();
        $subscriber->email = $email;
        $subscriber->name = $name;
        $subscriber->phone = $phone;
        $subscriber->source = isset($_GET['utm_source']) ? $_GET['utm_source'] : (isset($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : '');
        $mailer = new Mailer();
        $mailer->setFrom('info@amethyst-ws.ru', 'Поддержка Amethyst Web Studio');
        $mailer->addAddress($subscriber->email, $subscriber->name);
        $mailer->Subject = 'Спасибо за заявку.';
        $mailer->Body = '<html>
                            <head>
                                <meta charset="utf-8">
                            </head>
                            <body>
                                <h1>Здравствуйте, уважаемый, '.$subscriber->name.'!</h1>
                                <p>Спасибо за оставленную заявку на нашем сайте. В ближайшее время с Вами свяжется наш представитель, и вы сможете обсудить с ним все детали касательно разработки Вашего сайта.</p>
                                <p>Спасибо за проявленный интерес к нашей Веб студии</p>
                                </br></br>
                                <p>С наилучшими пожеланиями технический директор Amethyst Web Studio, Лещёв Никита.</p>
                                <p>Если вдруг сотрудник с Вами не связался, напишите лично мне: <a href="mailto:nikita@amethyst-ws.ru">nikita@amethyst-ws.ru</a></p>
                            </body>
                        </html>';
        $mailer->AltBody = 'Здравствуйте, уважаемый, '.$subscriber->name.'! Спасибо за оставленную заявку на нашем сайте.
                            В ближайшее время с Вами свяжется наш представитель, и вы сможете обсудить с ним все детали касательно разработки Вашего сайта.
                            Спасибо за проявленный интерес к нашей Веб студии.
                            С наилучшими пожеланиями технический директор Amethyst Web Studio, Лещёв Никита.
                            Если вдруг сотрудник с Вами не связался, напишите лично мне: nikita@amethyst-ws.ru';
        $clientMailSent = $mailer->send();
        if($clientMailSent && $subscriber->save()){
            $ourMailer = new Mailer();
            $ourMailer->setFrom('info@amethyst-ws.ru', 'Поддержка Amethyst Web Studio');
            $ourMailer->addAddress('mail@amethyst-ws.ru');
            $ourMailer->addAddress('sergey@amethyst-ws.ru');
            $ourMailer->Subject = 'Новый лид с сайта.';
            $ourMailer->Body = '<html>
                                    <head>
                                        <meta charset="utf-8">
                                    </head>
                                    <body>
                                        <p>У нас новая заявка:</p>
                                        <p>Имя: '.$subscriber->name.'</p>
                                        <p>Телефон: <a href="tel:'.$subscriber->phone.'">'.$subscriber->phone.'</a></p>
                                        <p>Почта: <a href="mailto: '.$subscriber->email.'">'.$subscriber->email.'</a></p>
                                    </body>
                                </html>';
            $ourMailer->AltBody = '';
            $ourMailer->send();
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