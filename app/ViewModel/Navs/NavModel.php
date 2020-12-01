<?php

namespace App\ViewModel\Navs;

class NavModel {
    public $navElementModels;

    public function __construct(){
        $this->navElemtModels = [];
    }

    public function addNavElement (NavElementModel $navElementModel){
        $this.$navElementModel[] = $navElementModel;
        return $this;
    }

    public function removeNavElement(NavElementModel $navElementModel){
        $index = array_search($navElement,$navElementModels);
        if($index)
            array_splice($navElementModels,$index,$index);
        else
            throw new \Excpetion("La suppresion ne marche pas car index no trouvé");
        
        return $this;
    }
    public function addNavItem($name,$url){
        $this->navElementModels[] =new NavItemModel($name,$url);
        return $this;
    }



    public function isNavItemModel(NavElementModel $navElementModel){
        if($navElementModel instanceof NavItemModel){
            return true;
        }
        return false;
    }

    public function isNavGroupModel(NavElementModel $navElementModel){
        if($navElementModel instanceof NavGroupModel){
            return true;
        }
        return false;
    }
}