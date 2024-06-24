<?php

namespace App\View\Components;
use Illuminate\View\Component;
use App\ViewModel\GenId;

abstract class ComponentWithId  extends Component{

    public $id;

    public function __construct($id=""){
        $this->id = $id;
    }

    public abstract function render();
}