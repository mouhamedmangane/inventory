<?php
namespace App\Util;
use Illuminate\Http\Request;

class ImageFactory {

    public static function store(Request $request,$model,$attrRequest,$directory,$id,$attrDatabase=''){
        if($request->has($attrRequest)){
            $nameFile=$id.'.'.$request->$attrRequest->extension();
            $request->$attrRequest->move($directory,$nameFile);
            if(empty($attrDatabase)){
                $attrDatabase=$attrRequest;
            }
            $model->$attrDatabase=$nameFile;
        }
       
    }
}