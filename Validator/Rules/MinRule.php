<?php

require_once ('AbstractRule.php');

class MinRule extends AbstractRule
{
    private static $rule = "min";

    public function validateRule($fieldName, $fieldVal, $message, $limit) 
    {
        unset($_SESSION["validationErrors"][$fieldName][self::$rule]);
        if (!isset($fieldVal) || strlen($fieldVal) < $limit) {
            $_SESSION["validationErrors"][$fieldName][self::$rule] = $message;
        }

        return $fieldVal;
    }
}
