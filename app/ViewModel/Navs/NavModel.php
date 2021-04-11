<?php

namespace App\ViewModel\Navs;

class NavModel  {

    public $navBlocModels;


    public function __construct($navBlocModels=[]){
        $this->navBlocModels = $navBlocModels;
    }

     function addNavBlocModel (NavBlocModel $navBlocModel){
        $this->navBlocModels[] = $navBlocModel;
        return $this;
    }

    public function removeNavBlocModel(NavBlocModel $navBlocModel){
        $index = array_search($navBloc,$navBlocModels);
        if($index)
            array_splice($navBlocModels,$index,$index);
        else
            throw new \Excpetion("La suppresion ne marche pas car index no trouvé");

        return $this;
    }




}
