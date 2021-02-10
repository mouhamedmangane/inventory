<?php

namespace ViewModel\NplEditorTableMd;

class GCellMd {
    private $name;
    private $refName;
    private $label;
    private $options;
    private $classGCell;
    private $data;

    public function __construct($name,$refName,$label){
        $this->name=$name;
        $this->refName=$refName;
        $this->label=$label;
        $this->options=[];
    }

    public function addOption($optionName,$optionValue){
        $this->options[$optionName]=$optionValue;
    }

    public function setData($data){
        $this->data=$data;
    }

}