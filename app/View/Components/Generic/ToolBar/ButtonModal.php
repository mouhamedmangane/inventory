<?php

namespace App\View\Components\Generic\ToolBar;

use Illuminate\View\Component;

class ButtonModal extends Component
{
    public $id,$text,$target;
    /**
    * Create a new component instance.
    *
    * @return void
    */
    public function __construct($id,$text,$target)
    {
        $this->id=$id;
        $this->text=$text;
        $this->target=$target;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.generic.tool-bar.button-modal');
    }
}
