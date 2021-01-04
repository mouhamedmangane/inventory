<?php

namespace App\View\Components\Generic\Input;

use Illuminate\View\Component;

class Radios extends Component
{
    public $name,$value,$data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$data,$value="")
    {
        $this->name = $name;
        $this->value = $value;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.input.radios');
    }
}
