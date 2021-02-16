<?php

namespace App\View\Components\Generic\NoppalEditorTable;

use Illuminate\View\Component;

class Table extends Component
{
    public $idTable,$columns,$dd;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idTable,$columns,$dd=null)
    {
        $this->idTable = $idTable;
        $this->columns = $columns;
        $this->dd  =$dd;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.noppal-editor-table.table');
    }
}
