<?php

class RulesFactory {
    public static function selectRule($rule, $field) {
        switch ($rule) {
            case 'required':

                exit($field);
                return new RequiredRule();
                break;
            case 'email':

                return new EmailRule();
                break;
            case 'min':

                return new MinRule();
                break;
        }
    }
}
