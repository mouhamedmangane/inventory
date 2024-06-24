<?php
namespace App\Helpers;

class URLInventory{

    // cette methode permet de prefexer un url donné par b/boutiqueId
    public static function wB($url){
        $boutiqueId = request()->urlBoutiqueId;
        return 'b/'.$boutiqueId.'/'.$url;
    }

    public static function wBurl($url){
        $boutiqueId = request()->urlBoutiqueId;
        return url('b/'.$boutiqueId.'/'.$url);
    }
}
