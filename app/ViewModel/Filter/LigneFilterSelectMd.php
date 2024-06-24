<?php

namespace App\ViewModel\Filter;
use App\ViewModel\Filter\LigneFilterMd;

class LigneFilterSelectMd extends LigneFilterMd {
    public $data;
    public function __construct ($name,$label,$data=[]){
        parent::__construct($name,$label);
        $this->data = $data;
    }

    public function addLigne($value,$label){
        $this->data[$value]=$label;
        return $this;
    }
    public function getData(){
        return $this->data;
    }
    public function getComponentName(){
        return 'generic.filters.ligne-filter-select';
    }

}