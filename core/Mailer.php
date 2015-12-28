<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.12.2015
 * Time: 12:27
 */

namespace core;


use PHPMailer;

class Mailer
{
    public static function getMailer(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hookah.msk.service@gmail.com';
        $mail->Password = 'UvSbtOAhlKgFsJ3b0wwy';
        $mail->SMTPSecure = 'TLS';
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        return $mail;
    }
}