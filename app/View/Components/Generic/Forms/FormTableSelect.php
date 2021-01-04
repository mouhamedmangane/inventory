<?php

namespace App\View\Components\Generic\Forms;

use Illuminate\View\Component;

class FormTableSelect extends Component
{
    public $name,$data,$labelText,$value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$data,$labelText,$value="")
    {
        $this->name = $name;
        $this->data = $data;
        $this->labelText = $labelText;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.forms.form-table-select');
    }
}
