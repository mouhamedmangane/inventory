<?php
namespace App\ViewModel;

class GenId{
    static $id;
    static function getId(){
        return self::$id;
    }
    static function newId(){
        self::$id ++;
        return "cz".self::$id;
    }
}