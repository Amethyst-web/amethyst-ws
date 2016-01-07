<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.12.2015
 * Time: 12:27
 */

namespace core;


use PHPMailer;
use config\Mailer as ConfMailer;

class Mailer extends PHPMailer
{
    function __construct($exceptions = false)
    {
        parent::__construct($exceptions);
        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth = true;
        $this->Username = ConfMailer::USERNAME;
        $this->Password = ConfMailer::PASSWORD;
        $this->SMTPSecure = 'TLS';
        $this->Port = 587;
        $this->isHTML(true);
        $this->CharSet = "UTF-8";
    }
}