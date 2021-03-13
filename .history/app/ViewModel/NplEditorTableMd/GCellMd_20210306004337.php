<?php

namespace App\ViewModel\NplEditorTableMd;

class GCellMd {
    public $name;
    public $refName;
    public $label;
    public $options;
    public $classGCell;
    public $data;
    public $classTd;
    public $classInput;

    public function __construct($name,$refName,$label){
        $this->name=$name;
        $this->refName=$refName;
        $this->label=$label;
        $this->options=[];
        $this->classTd='';
        $this->classInput='';
    }

    public function addOption($optionName,$optionValue){
        $this->options[$optionName]=$optionValue;
        return $this;
    }

    public function setClassTd($classTd){
        $this->classTd=$classTd
    }

    public function setClassInput($classInput)

    public function setData($data){
        $this->data=$data;
        return $this;
    }

    public function addRowData($row,$key=-1){
        if($key===-1)
            $this->data[]=$row;
        else
            $this->data[$key]=$row;
        
        return $this;
    }

}