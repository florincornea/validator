<?php

require_once ('AbstractRule.php');

class MaxRule extends AbstractRule
{
    private static $rule = "max";

    public function validateRule($fieldName, $fieldVal, $message, $limit) 
    {
        unset($_SESSION["validationErrors"][$fieldName][self::$rule]);
        if (!isset($fieldVal) || strlen($fieldVal) > $limit) {
            $_SESSION["validationErrors"][$fieldName][self::$rule] = $message;
        }

        return $fieldVal;
    }
}
