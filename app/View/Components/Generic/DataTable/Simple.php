<?php

namespace App\View\Components\Generic\DataTable;

use Illuminate\View\Component;

class Simple extends Component
{
    public $name,//nom de la variable datatable dans le js
           $columns,
           $url,
           $searchId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$columns,$url="",$searchId="")
    {
        $this->name = $name;
        $this->columns = $columns;
        $this->url = $url;
        $this->searchId =$searchId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.data-table.simple');
    }
}
