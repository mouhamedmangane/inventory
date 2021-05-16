<?php

namespace App\View\Components\Generic\Input;

use Illuminate\View\Component;

class Telephone extends Component
{
    public $name,$indicatif,$numero;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$indicatif='',$numero='')
    {
        $this->name = $name;
        $this->indicatif=$indicatif;
        $this->numero=$numero;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.input.telephone');
    }
}
