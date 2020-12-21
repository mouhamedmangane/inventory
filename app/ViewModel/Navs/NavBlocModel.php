<?php

namespace App\ViewModel\Navs;

class NavBlocModel implements NavElementModel {
 

    public $navElementModels;
    public $name;

    public function __construct($navElementModels=[],$name=""){
        $this->navElementModels = $navElementModels  ;
        $this->name = $name;
    }

    private function addNavElementModel (NavElementModel $navElementModel){
        $this->navElementModels[] = $navElementModel;
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

    public function addNavItemModel($name,$url="",$icon=""){
        return $this->addNavElementModel(new NavItemModel($name,$url,$icon));
    }

    public function addNavGroupModel(NavGroupModel $navGroupModel){
        return $this->addNavElementModel($navGroupModel);
    }

  
    public function getName(){

    }
}