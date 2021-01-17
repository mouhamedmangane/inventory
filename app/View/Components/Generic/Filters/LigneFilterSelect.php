<?php

namespace App\View\Components\Generic\Filters;

use Illuminate\View\Component;

class LigneFilterSelect extends Component
{   
    public $name;
    public  $datas;
    /**
     * Create a new  component instance.
     *
     * @return void
     */
    public function __construct($name, $datas)
    {
        $this->name = $name;
        $this->datas = $datas;
    } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.filters.ligne-filter-select');
    }
}
