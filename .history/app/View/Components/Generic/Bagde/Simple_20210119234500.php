<?php

namespace App\View\Components\Generic\Bagde;

use Illuminate\View\Component;

class Simple extends Component
{
    public $name,$styleClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$styleClass)
    {
        $this->name = $name;
        $this->styleClass = $styleClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.bagde.simple');
    }
}
