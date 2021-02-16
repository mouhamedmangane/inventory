<?php

namespace ViewModel\NplEditorTableMd;
use ViewModel\NplEditorTableMd\GCellMd;
class GCellSelectMd extends GCellMd{

    private const OP_UNIQUE='unique';
    private const OP_DEFAULT_OPTION='defaultOption';
    private const DEFAULT_SELECT_TEXT='selectionner';

    private $textProp;
    private $valueProp;

    public function __construct($name,$refName,$label,$textProp,$valueProp){
        parent::__construt($name,$refName,$label);
        $this->classGCell="GCellSelect";
        $this->textProp=$textProp;
        $this->valueProp=$valueProp;
        $selectText=self::DEFAULT_SELECT_TEXT'selectionnne'
        $this->options[self::OP_UNIQUE]=(object)[$textProp=>];
    }

    public function unique($isunique){
        $this->options['unique'] = $isunique;
        return $this;
    }

    public function defaultOption($text,$value){
        $this->options['defaultOption']=(object)[$this->valueProp=>$value,$this->textProp=>$text];
        return $this;
    }

    public function defaultOptionWithObject($object){
        $this->options['defaultOption']=$object;
        return $this;
    }

}