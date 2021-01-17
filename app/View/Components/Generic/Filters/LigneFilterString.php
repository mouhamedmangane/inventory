<?php

namespace App\View\Components\Generic\Filters;

use Illuminate\View\Component;

class LigneFilterString extends Component
{
    public $name,$valeur,$label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label,$valeur="")
    {
        $this->name = $name;
        $this->valeur = $valeur;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.filters.ligne-filter-string');
    }
}
