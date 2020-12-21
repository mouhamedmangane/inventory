<?php

namespace App\View\Components\Conteneur;

use Illuminate\View\Component;

class ListView extends Component
{
    public $navModel;
    public $actions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($navModel,$actions)
    {
        $this->navModel = $navModel;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.conteneur.list-view');
    }
}
