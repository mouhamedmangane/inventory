<?php

namespace App\Http\ResponseAjax;
Use Validator;

class Validation{

    public static function validate($validator){
        $message='';
        foreach($validator->errors()->all() as $mes){
            $message.=$mes.' <br>';
        }
        return [
            'status'=>false,
            'message'=>$message,
            "errors"=>$validator->errors()
        ];
    }
    
}