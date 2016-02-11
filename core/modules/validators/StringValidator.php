<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2016
 * Time: 18:19
 */

namespace core\modules\validators;


class StringValidator
{
    function __construct()
    {
    }

    public function validate(&$value, $maxLength = 50, $minLength = 0){
        $value = trim($value);
        if(isset($value{$maxLength + 1}) || !isset($value{$minLength})){
            return false;
        }
        return filter_var($value) !== false;
    }
}