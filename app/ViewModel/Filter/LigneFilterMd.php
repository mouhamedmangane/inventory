<?php

namespace App\ViewModel\Filter;


abstract class LigneFilterMd{

    public $name,$label,$idSearch;
   
    public function __construct($name,$label){
        $this->name = $name;
        $this->label = $label; 
        $this->idSearch=false;
        
    }
    public function setIdSearch($idSearch){
        $this->idSearch = $idSearch;
    }
    public abstract function getData();

    public abstract  function getComponentName();

}