<?php

namespace App\View\Components\Composant;

use App\View\Components\ComponentWithId;

class ActionBar extends ComponentWithId
{
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items,$id="")
    {
        parent::__construct($id);
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.composant.action-bar');
    }
}
