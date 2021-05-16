<?php

namespace App\View\Components\Generic\Forms;

use Illuminate\View\Component;

class FormTableTelephone extends Component
{
    public $name,$indicatif,$numero,$labelText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$labelText,$indicatif='',$numero='')
    {
        $this->indicatif=$indicatif;
        $this->name=$name;
        $this->labelText=$labelText;
        $this->numero=$numero;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.forms.form-table-telephone');
    }
}
