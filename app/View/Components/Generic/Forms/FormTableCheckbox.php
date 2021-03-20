<?php

namespace App\View\Components\Generic\Forms;

use Illuminate\View\Component;

class FormTableCheckbox extends Component
{
    public $name,$value,$labelText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$labelText,$value="")
    {
        $this->name = $name;
        $this->value = $value;
        $this->labelText = $labelText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.forms.form-table-checkbox');
    }
}
