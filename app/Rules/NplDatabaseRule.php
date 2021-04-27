<?php

namespace App\Rules;

class NplDatabaseRule {


    public static function exists($table){
        return new \App\Rules\ExistsValueChange($table);
    }
}