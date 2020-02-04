<?php
require_once ('./Validator/RulesFactory.php');

class Validator
{
    public static function validate($fieldName, $fieldVal, $rules, $messages)
    {
        $rulesFactory = new RulesFactory();
        $rules = explode("|", $rules);

        session_start();
        foreach ($rules as $rule) {
            $limit = 0;
            if (strpos($rule, ':') !== false) {
                $ruleWithLimit = explode(':', $rule);
                $rule = $ruleWithLimit[0];
                $limit = $ruleWithLimit[1];
            }

            $rulesFactory->selectRule(
                $fieldName,
                $fieldVal,
                $rule,
                $messages[$rule],
                $limit
            );
        }

        return $fieldVal;
    }

    public function fails() {
        $errorsArray = [];

        if (isset($_SESSION["validationErrors"])) {
            foreach ($_SESSION["validationErrors"] as $errors) {
                foreach ($errors as $error) {
                    $errorsArray[] = $error;
                }
            }

            return $errors;
        }

        return false;
    }
}
