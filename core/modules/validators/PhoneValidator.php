<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2016
 * Time: 17:51
 */

namespace core\modules\validators;


class PhoneValidator
{
    private $phoneRegExp = "/^\+7 \(\d{3}\) \d{3}\-\d{2}-\d{2}( x\d{1,6})?$/";

    function __construct()
    {
    }

    public function validate(&$value, $maxLength = 50){
        $value = trim($value);
        if(isset($value{$maxLength + 1})){
            return false;
        }

        return preg_match($this->phoneRegExp,$value) === 1;
    }
}