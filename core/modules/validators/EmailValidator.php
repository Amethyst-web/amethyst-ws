<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 07.01.2016
 * Time: 21:38
 */

namespace core\modules\validators;


class EmailValidator
{
    function __construct()
    {
    }

    public function validate($value, $maxLength = 50){
        if(isset($value{$maxLength + 1})){
            return false;
        }
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}