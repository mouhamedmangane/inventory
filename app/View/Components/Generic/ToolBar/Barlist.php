<?php

namespace App\View\Components\Generic\ToolBar;

use Illuminate\View\Component;
use App\ViewModel\Filter\FilterMd;

class Barlist extends Component
{   
    public $url,$filter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(FilterMd $filter=null)
    {
        $this->filter=$filter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.tool-bar.barlist');
    }
}
