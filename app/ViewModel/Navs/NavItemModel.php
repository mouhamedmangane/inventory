<?php

namespace App\ViewModel\Navs;

Class NavItemModel implements NavElementModel{
    public $name,$url,$icon;

    public function __construct($name,$url,$icon="")
    {   
        $this->name = $name;
        $this->url = $url;
        $this->icon = $icon;
    }

    public function getName(){
        return $this->name();
    }
}    