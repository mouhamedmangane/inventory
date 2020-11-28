<?php

namespace App\ViewModel\Navs;

class NavModelFactory{
    static function navModel(){
        return new NavModel();
    }

    static function navItemModel($name,$url,$icon=""){
        return new NavItemModel($name,$url,$icon);
    }

    static function navGroupModel($name){
        return new NavGroupModel($name);
    }
}