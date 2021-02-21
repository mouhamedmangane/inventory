<?php
namespace App\ViewModel\Filter;

use App\ViewModel\Filter\LigneFilterSelectMd;
use App\ViewModel\Filter\LigneFilterIntervalrMd;
use App\ViewModel\Filter\LigneFilterOneMd;
use App\ViewModel\Filter\FilterMd;

class FilterFactory {
    
    public static function filterMd($idSelect="",$list=[]){
        return new FilterMd($idSelect,$list);
    }
    public static function ligneIntervalMd($name,$label,$type,$min,$max,$value,$op='egal'){
        return new LigneFilterIntervalMd($name,$label,$type,$min,$max,$value,$op);

    }

    public static function ligneSelectMd($name,$data=[]){
        return new LigneFilterSelectMd($name,$data);
    }

    public static function ligneOneMd($name,$label,$type,$value,$op='egal'){
        return new LigneFilterOneMd($name,$label,$type,$op,$value);
    }
}