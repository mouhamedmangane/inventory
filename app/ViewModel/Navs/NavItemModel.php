<?php

namespace App\ViewModel\Navs;

Class NavItemModel implements NavElementModel{
    public $name,$url,$icon,$active;

    public function __construct($name,$url="",$icon="",$active=false)
    {
        $this->name = $name;
        $this->url = $url;
        $this->icon = $icon;
        $this->active = $active;
    }

    public function getName(){
        return $this->name;
    }
}
