<?php
require('./Validator/RulesFactory.php');

class Validator {
    public static function validate($field, $rules, $messages=null) {
        $rulesFactory = new RulesFactory();
        $rules = explode("|", $rules);

        foreach ($rules as $rule) {
            $rulesFactory->selectRule($rule, $field);
        }
        
        var_dump($rules);
        return $field;
    }
}
