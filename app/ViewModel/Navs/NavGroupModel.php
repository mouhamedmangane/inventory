<?php

namespace App\ViewModel\Navs;

Class NavGroupModel implements NavElementModel{
    public $name;
    public $navItemModels;

    public function __construct($name="",$navItemModels=[])
    {   
        $this->name = $name;
        $this->navItemsModels= $navItemModels;
    }

    public function getName(){
        return $this->name();
    }

    public function add(NavItemModel $navItemeModel){
        $this->navItemModels[]=$navItemModel;
        return $this;
    }

    public function remove(NavItemModel $navItemModel){
        $index = array_search($navItemModel,$navItemModels);
        if($index)
            array_splice($navItemModels,$index,$index);
        else
            throw new \Excpetion("La suppresion ne marche pas car index no trouvé");
        
        return $this;
    }
}  