<?php
require_once ('Rules/RequiredRule.php');
require_once ('Rules/MinRule.php');
require_once ('Rules/MaxRule.php');

class RulesFactory
{
    public static function selectRule($fieldName, $fieldVal, $rule, $message, $limit)
    {
        switch ($rule) {
            case 'required':
                $rule = new RequiredRule();

                $rule->validateRule(
                    $fieldName,
                    $fieldVal,
                    $message,
                    $limit
                );
                break;
            case 'email':

                return new EmailRule();
                break;
            case 'min':
                $rule = new MinRule();

                $rule->validateRule(
                    $fieldName,
                    $fieldVal,
                    $message,
                    $limit
                );
                break;
            case 'max':
                $rule = new MaxRule();

                $rule->validateRule(
                    $fieldName,
                    $fieldVal,
                    $message,
                    $limit
                );
                break;
        }
    }
}
