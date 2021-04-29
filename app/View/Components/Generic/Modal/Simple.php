<?php

namespace App\View\Components\Generic\Modal;

use Illuminate\View\Component;

class Simple extends Component
{

    public $id,$titre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$titre)
    {
        $this->id=$id;
        $this->titre=$titre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.modal.simple');
    }
}
