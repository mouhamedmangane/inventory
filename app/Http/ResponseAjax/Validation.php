<?php

namespace App\Http\ResponseAjax;
Use Validator;

class Validation{

    public static function validate($validator){
        return [
            'status'=>false,
            'message'=>\App\Util\Validation::textMessages($validator),
            "errors"=>$validator->errors()
        ];
    }
    
}