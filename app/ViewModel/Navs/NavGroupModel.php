<?php

namespace App\ViewModel\Navs;

Class NavGroupModel implements NavElementModel{


    public $name,$icon;
    public $navElementModels;

    public function __construct($name,$icon="",$navElementModels=[])
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->navElementModels= $navElementModels;
    }

    public function getName(){
        return $this->name;
    }

    public function addNavElementModel(NavElementModel $navElementModel){
        $this->navElementModels[]=$navElementModel;
        return $this;
    }

    public function addNavItemModel($name,$url,$active=false){
        return $this->addNavElementModel(new NavItemModel($name,$url,"",$active));
    }

    public function addNavGroupModel(NavGroupModel $navGroupModel){
        $this->addNavElement($navGroupModel);
        return $this;
    }

    public function removeNavElementModel(NavElement $navElementModel){
        $index = array_search($navElementModels,$navElementModels);
        if($index)
            array_splice($navElementModels,$index,$index);
        else
            throw new \Excpetion("La suppresion ne marche pas car index no trouvé");

        return $this;
    }
}
