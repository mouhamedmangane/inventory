<?php

namespace App\View\Components\Composant;

use App\View\Components\ComponentWithId;

class DropDownTitre extends ComponentWithId
{
    public $navModel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($navModel)
    {
        parent::__construct();
        $this->navModel = $navModel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.composant.drop-down-titre');
    }
}
