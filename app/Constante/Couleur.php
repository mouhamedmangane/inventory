<?php

namespace App\Constante;

 class Couleur{

    public static $couleurs=[
        'bg-secondary text-white',
        'bg-primary text-white',
        'bg-info text-dark',
        'bg-light text-dark',
        'bg-success text-white',
        'bg-danger text-white',
        'bg-warning text-black',
        'bg-dark text-white',
        'bg-body text-dark',
        'bg-white text-dark',
        'bg-transparent text-dark'
    ];
    public static $couleur_exclut=[];

    public static function aléatoires($name){
        $index=\App\Util\NplTableau::choisirParString(self::$couleurs,$name);
        $color=self::$couleurs[$index];
        array_splice(self::$couleurs,$index,1);
        if(!in_array($color,self::$couleur_exclut)){
            self::$couleur_exclut[]=$color;
        }
        if(count(self::$couleurs)<=0){
            array_merge(self::$couleurs, self::$couleur_exclut);
        }

        return $color;
    }

    
 }