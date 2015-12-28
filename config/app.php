<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 19:17
 */

namespace config;

class App
{
    const SUPPORT_NAME = 'Amethyst Web Studio';

    const EMAIL_REGEXP = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
    const PHONE_REGEXP = '/^(\+7|8)[0-9]{10}$/';
}