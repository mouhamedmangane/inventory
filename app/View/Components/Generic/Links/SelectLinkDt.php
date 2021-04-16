<?php

namespace App\View\Components\Generic\Links;

use Illuminate\View\Component;

class SelectLinkDt extends Component
{   
    public $idDataTable,$dt,$value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idDataTable,$dt,$value)
    {
        $this->idDataTable=$idDataTable;
        $this->dt=$dt;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.links.select-link-dt');
    }
}
