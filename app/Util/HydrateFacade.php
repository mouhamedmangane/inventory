<?php
namespace App\Util;

class HydrateFacade{

    public static function get($cible,$source,$props){
        return new Hydrate($cible,$sourc,$props);
    }
    public static function make($cible,$source,$props){
        $hydate= new Hydrate($cible,$source,$props);
        $hydate->make();
    }
}