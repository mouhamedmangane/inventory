<?php

namespace App\Util;

class Validation {

    public static function textMessages($validator){
        $message='';
        foreach($validator->errors()->all() as $mes){
            $message.=$mes.' <br>';
        }
        return$message;
         
    }
}